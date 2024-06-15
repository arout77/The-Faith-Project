<?php
namespace App\Controller;
use Src\Controller\Base_Controller;

class Register_Controller extends Base_Controller
{
	public function check_if_company_name_is_taken()
	{
		// Used on registration form when company name is given after selecting "No, company doesnt exist" in step 1
		$name        = $_POST['company_name'];
		$db          = $this->model( "Register" );
		$companyname = $db->checkForCompanyName( $name );
		if ( is_null( $companyname ) || !$companyname )
		{
			echo '1';
		}
		else
		{
			echo $companyname;
		}
	}

	public function complete()
	{
		$this->template->render( 'forms/complete.html.twig' );
	}

	public function confirm_company_exists()
	{
		// Used on registration form when company id is given after selecting "Yes, company exists" in step 1
		$hash        = preg_replace( "/[^a-zA-Z0-9]/", "", $_POST['company_hash'] );
		$db          = $this->model( "Register" );
		$companyname = $db->getCompanyName( $hash );
		if ( is_null( $companyname ) || !$companyname )
		{
			echo '1';
		}
		else
		{
			echo $companyname;
		}
	}

	/**
	 * @param $size
	 */
	public function convertToReadableSize( $size )
	{
		$base   = log( $size ) / log( 1024 );
		$suffix = ["", "KB", "MB", "GB", "TB"];
		$f_base = floor( $base );
		return round( pow( 1024, $base - floor( $base ) ), 1 ) . $suffix[$f_base];
	}

	public function index()
	{
		// Model was created and stored at: /app/models/RegisterModel.php
		$this->template->render( 'forms/register.html.twig' );
	}

	public function new_agent()
	{
		$this->template->render( 'forms/register-agent.html.twig' );
	}

	public function process()
	{
		$validate = $this->load->middleware( 'validation' );
		$validate->form( $_POST, [
			'firstname'    => [
				'First Name' => 'min_length,3|max_length,40|required|word',
			],
			'lastname'     => [
				'Last Name' => 'min_length,2|max_length,40|required|word',
			],
			'company_id'   => [
				'Company ID' => 'min_length,32|max_length,32|alphanum',
			],
			'company_name' => [
				'Company Name' => 'min_length,1|max_length,75|required|word',
			],
			'url'          => [
				'Company URL' => 'url',
			],
			'email'        => [
				'Email Address' => 'email|required',
			],
			'phone'        => [
				'Telephone' => 'required',
			],
			'password'     => [
				'Password' => 'min_length,8|max_length,75',
			],
			'cpassword'    => [
				'Confirm Password' => 'identical=' . $_POST['password'],
			],
		] );
		$errors = $validate->errors();

		if ( empty( $errors ) )
		{
			try {
				$db = $this->model( "Register" );
				$db->createCompany( $_POST );
				$db->createClient( $_POST );
				if ( !empty( $_FILES['avatar'] ) )
				{
					$username = $_POST['firstname'] . '_' . $_POST['lastname'] . '_' . str_replace( " ", "-", $_POST['company_name'] );
					self::upload_avatar( $_FILES['avatar'], $username, $_POST['email'] );
				}
				$this->redirect( 'register/complete/' );
				exit;
			}
			catch ( Exception $e )
			{
				$e->getMessage();
			}
		}
	}

	public function process_new_agent()
	{
		$validate = $this->load->middleware( 'validation' );
		$validate->form( $_POST, [
			'firstname' => [
				'First Name' => 'min_length,3|max_length,40|required|word',
			],
			'lastname'  => [
				'Last Name' => 'min_length,2|max_length,40|required|word',
			],
			'email'     => [
				'Email Address' => 'email|required',
			],
			'password'  => [
				'Password' => 'min_length,8|max_length,75',
			],
			'cpassword' => [
				'Confirm Password' => 'identical=' . $_POST['password'],
			],
		] );

		$errors = $validate->errors();

		if ( empty( $errors ) )
		{
			try {
				$db = $this->model( "Register" );
				$db->createAgent( $_POST );
				if ( !empty( $_FILES['avatar'] ) )
				{
					$username = $_POST['firstname'] . '_' . $_POST['lastname'];
					self::upload_agent_avatar( $_FILES['avatar'], $username, $_POST['email'] );
				}
				$this->redirect( 'register/complete/' );
				exit;
			}
			catch ( Exception $e )
			{
				$e->getMessage();
			}
		}
	}

	/**
	 * @param $file
	 * @param $name
	 * @param $email
	 * @return mixed
	 */
	public function upload_agent_avatar( $file, $name, $email )
	{
		// $file must be the $_FILE superglobal + form input name
		// ex:  $_FILES['image_name']
		$target_dir    = $this->config->setting( "public_path" ) . 'media/img/agents/';
		$new_file_name = $name;
		$handle        = $this->load->middleware( 'file' );
		$handle->upload( $file );

		if ( $handle->uploaded )
		{
			$handle->allowed            = ['jpg', 'jpeg', 'png', 'gif', 'tiff', 'svg'];
			$handle->file_new_name_body = $new_file_name;
			$handle->image_convert      = 'png';
			$handle->image_resize       = true;
			$handle->image_x            = 200;
			$handle->image_ratio_y      = true;
			$handle->process( $target_dir );
			if ( $handle->processed )
			{
				$handle->clean();
				$db = $this->model( "Register" );
				$db->update_avatar( $new_file_name, $email );
				return true;
			}
			else
			{
				return $handle->error;
			}
		}
	}

	/**
	 * @param $file
	 */
	public function upload_avatar( $file, $name, $email )
	{
		// $file must be the $_FILE superglobal + form input name
		// ex:  $_FILES['image_name']
		$target_dir    = $this->config->setting( "public_path" ) . 'media/img/clients/';
		$new_file_name = $name;
		$handle        = $this->load->middleware( 'file' );
		$handle->upload( $file );

		if ( $handle->uploaded )
		{
			$handle->allowed            = ['jpg', 'jpeg', 'png', 'gif', 'tiff', 'svg'];
			$handle->file_new_name_body = $new_file_name;
			$handle->image_convert      = 'png';
			$handle->image_resize       = true;
			$handle->image_x            = 200;
			$handle->image_ratio_y      = true;
			$handle->process( $target_dir );
			if ( $handle->processed )
			{
				$handle->clean();
				$db = $this->model( "Register" );
				$db->update_avatar( $new_file_name, $email );
				return true;
			}
			else
			{
				return $handle->error;
			}
		}
		// if ( $_SERVER["REQUEST_METHOD"] == "POST" )
		// {
		// 	// To check whether directory exist or not
		// 	if ( !is_dir( $target_dir ) )
		// 	{
		// 		mkdir( $target_dir );
		// 		$uploadOk = 1;
		// 	}
		// 	else
		// 	{
		// 		echo "Specify the directory name...";
		// 		$uploadOk = 0;
		// 		exit;
		// 	}

		// 	// Check if file was uploaded without errors
		// 	if ( isset( $_FILES["avatar"] ) &&
		// 		$_FILES["avatar"]["error"] == 0 )
		// 	{
		// 		$allowed_ext =
		// 			[
		// 			"jpg"  => "image/jpg",
		// 			"jpeg" => "image/jpeg",
		// 			"gif"  => "image/gif",
		// 			"png"  => "image/png",
		// 		];
		// 		$file_name = $_FILES["avatar"]["name"];
		// 		$file_type = $_FILES["avatar"]["type"];
		// 		$file_size = $_FILES["avatar"]["size"];

		// 		// Verify file extension
		// 		$ext = pathinfo( $file_name, PATHINFO_EXTENSION );

		// 		if ( !array_key_exists( $ext, $allowed_ext ) )
		// 		{
		// 			die( "Error: Only JPG/JPEG, PNG and GIF files allowed." );
		// 		}

		// 		// Verify file size
		// 		$maxsize   = $this->config->setting( "max_file_upload_size" );
		// 		$sizelimit = self::convertToReadableSize( $maxsize );

		// 		if ( $file_size > $maxsize )
		// 		{
		// 			die( "Error: Maximum file size allowed is $sizelimit" );
		// 		}

		// 		// Verify MIME type of the file
		// 		if ( in_array( $file_type, $allowed_ext ) )
		// 		{
		// 			// Check whether file exists before uploading it
		// 			if ( file_exists( "upload/" . $_FILES["avatar"]["name"] ) )
		// 			{
		// 				echo $_FILES["avatar"]["name"] . " already exists.";
		// 			}
		// 			else
		// 			{
		// 				if ( move_uploaded_file( $_FILES["avatar"]["tmp_name"],
		// 					$target_file ) )
		// 				{
		// 					echo "The file " . $_FILES["avatar"]["name"] .
		// 						" has been uploaded.";
		// 				}
		// 				else
		// 				{
		// 					echo "Sorry, there was an error uploading your file.";
		// 				}
		// 			}
		// 		}
		// 		else
		// 		{
		// 			echo "Error: Please try again.";
		// 		}
		// 	}
		// 	else
		// 	{
		// 		echo "Error: " . $_FILES["avatar"]["error"];
		// 	}
		// }
	}
}