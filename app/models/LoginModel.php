<?php
namespace App\Model;
use Src\Model\System_Model;

class LoginModel extends System_Model
{
	/**
	 * @var mixed
	 */
	public $agent_access_level;

	/**
	 * @var mixed
	 */
	public $agent_avatar;

	/**
	 * @var mixed
	 */
	public $agent_email;

	/**
	 * @var mixed
	 */
	public $agent_first_name;

	/**
	 * @var mixed
	 */
	public $agent_id;

	/**
	 * @var mixed
	 */
	public $agent_last_name;

	/**
	 * @var mixed
	 */
	public $agent_role;

	/**
	 * @var mixed
	 */
	public $client_access_level;

	/**
	 * @var mixed
	 */
	public $client_avatar;

	/**
	 * @var mixed
	 */
	public $client_company;

	/**
	 * @var mixed
	 */
	public $client_email;

	/**
	 * @var mixed
	 */
	public $client_first_name;

	/**
	 * @var mixed
	 */
	public $client_id;

	/**
	 * @var mixed
	 */
	public $client_last_name;

	/**
	 * @var mixed
	 */
	public $client_role;

	public function updateLastLoginAgent()
	{
	}

	/**
	 * @param string $email
	 * @param string $password
	 * @return mixed
	 */
	public function verifyAgentLogin( string $email, string $password )
	{
		$db = $this->findOne( 'agents', ' email = ? ', [$email] );

		if ( is_null( $db ) )
		{
			return false;
		}

		if ( password_verify( $password, $db->password ) )
		{
			// Update last login col
			$this->load( 'agents', $db->id );
			$db->last_login = date( "Y-m-d H:i:s" );
			$this->store( $db );

			$this->agent_id = $db->id;

			$this->agent_access_level = $db->access_level;

			$this->agent_email = $db->email;

			$this->agent_first_name = $db->agent_first_name;

			$this->agent_last_name = $db->agent_last_name;

			$this->agent_role = $db->role;

			$this->agent_avatar = $db->avatar;

			return $db;
		}

		return false;

	}

	/**
	 * @param string $email
	 * @return mixed
	 */
	public function verifyLogin( string $email, string $password )
	{
		$db = $this->findOne( 'clients', ' email = ? ', [$email] );

		if ( is_null( $db ) )
		{
			return false;
		}

		if ( password_verify( $password, $db->password ) )
		{
			// Update last login col
			$this->load( 'clients', $db->id );
			$db->last_login = date( "Y-m-d H:i:s" );
			$this->store( $db );

			$this->client_id = $db->id;

			$this->client_access_level = $db->access_level;

			$this->client_company = $db->company;

			$this->client_email = $db->email;

			$this->client_first_name = $db->client_first_name;

			$this->client_last_name = $db->client_last_name;

			$this->client_role = $db->role;

			$this->client_avatar = $db->avatar;

			return $db;
		}

		return false;

	}
}