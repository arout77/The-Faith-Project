<?php
namespace App\Model;
use Src\Model\System_Model;

class RegisterModel extends System_Model
{
	/**
	 * @param string $name
	 * @return mixed
	 */
	public function checkForCompanyName( string $name )
	{
		$company = $this->findOne( 'companies', ' company_name = ? ', [$name] );

		if ( is_null( $company ) )
		{
			return false;
		}

		return $company->company_name;
	}

	/**
	 * @param $data
	 * @return mixed
	 */
	public function createAgent( $data )
	{
		extract( $data );

		// Access levels:
		// 1- dev
		// 2- manager
		// 3- admin
		$access_level = (integer) 1;

		switch ( $role )
		{
		case "project manager":
			$access_level = (integer) 2;
			break;
		case "owner":
			$access_level = (integer) 3;
			break;

		default:
			$access_level = (integer) 1;
		}

		$options  = ["cost" => 12];
		$password = strip_tags( $password );
		$password = password_hash( $password, PASSWORD_DEFAULT, $options );

		$db                       = $this->dispense( 'agents' );
		$db->agent_first_name     = ucwords( $firstname );
		$db->agent_last_name      = ucwords( $lastname );
		$db->password             = $password;
		$db->email                = $email;
		$db->email_confirmed      = 0;
		$db->phone                = $phone;
		$db->phoneext             = $phoneext;
		$db->role                 = ucwords( $role_in_company );
		$db->access_level         = $access_level;
		$db->account_created_date = date( "Y-m-d" );
		// $db->last_login           = '';
		return $id = $this->store( $db );
	}

	/**
	 * If this is a new account, the company MUST be created
	 * before the client account is added.
	 *
	 * @param $data
	 * @return mixed
	 */
	public function createClient( $data )
	{
		extract( $data );

		// Access levels:
		// 1- basic
		// 2- admin
		// 3- super_admin
		$access_level = (integer) 1;

		if ( !isset( $company_id ) || $company_id == '' )
		{
			// If company ID (hash) was not given, then this is a new account
			// FIRST create the company, and then grant
			// the new account creator super admin rights
			$access_level = (integer) 3;
		}

		$options  = ["cost" => 12];
		$password = strip_tags( $password );
		$password = password_hash( $password, PASSWORD_DEFAULT, $options );

		$db                       = $this->dispense( 'clients' );
		$db->client_first_name    = ucwords( $firstname );
		$db->client_last_name     = ucwords( $lastname );
		$db->password             = $password;
		$db->email                = $email;
		$db->email_confirmed      = 0;
		$db->company              = $company_name;
		$db->phone                = $phone;
		$db->role                 = ucwords( $role_in_company );
		$db->access_level         = $access_level;
		$db->account_created_date = date( "Y-m-d" );
		// $db->last_login           = '';
		return $id = $this->store( $db );
	}

	/**
	 * @param $data
	 * @return mixed
	 */
	public function createCompany( $data )
	{
		// Membership plans:
		// Free, Monthly, Annual or Lifetime
		extract( $data );

		$check_if_already_exists = $this->getRow( 'SELECT company_name FROM companies WHERE company_name = ? LIMIT 1',
			[$company_name]
		);

		if ( !$check_if_already_exists || is_null( $check_if_already_exists || $check_if_already_exists == '' ) )
		{
			$company_id                           = md5( $company_name . time() );
			$today                                = date( "Y-m-d" );
			$current_membership_plan_expires_date = date( 'Y-m-d', strtotime( $today . ' +1 month' ) );

			$db                                     = $this->dispense( 'companies' );
			$db->company_name                       = $company_name;
			$db->company_hash                       = $company_id;
			$db->current_membership_plan            = 'Monthly';
			$db->current_membership_plan_start_date = $today;
			$db->current_membership_plan_expires    = $current_membership_plan_expires_date;
			$db->primary_contact_name               = $firstname . ' ' . $lastname;
			$db->primary_contact_email              = $email;
			$db->url                                = $url;
			$db->account_created_date               = $today;
			return $id                              = $this->store( $db );
		}
	}

	/**
	 * @param string $id
	 * @return mixed
	 */
	public function getCompanyHash( string $id )
	{
		$company = $this->findOne( 'companies', ' id = ? ', [$id] );

		if ( is_null( $company ) )
		{
			return false;
		}

		return $company->company_hash;
	}

	/**
	 * @param string $name
	 */
	public function getCompanyID( string $name )
	{
		$company = $this->findOne( 'companies', ' name = ? ', [$name] );

		if ( is_null( $company ) || !$company )
		{
			return false;
		}

		return $company->id;
	}

	/**
	 * @param string $hash
	 * @return mixed
	 */
	public function getCompanyName( string $hash )
	{
		if ( isset( $_POST['company_hash'] ) )
		{
			$hash = $_POST['company_hash'];
		}

		$company = $this->findOne( 'companies', ' company_hash = ? ', [$hash] );

		if ( is_null( $company ) )
		{
			return false;
		}

		return $company->company_name;

	}

	/**
	 * @param $new_file_name
	 */
	public function update_avatar( $new_file_name, $email )
	{
		return $this->exec( 'UPDATE clients SET avatar = ? WHERE email = ?', [$new_file_name . '.png', $email] );
	}
}