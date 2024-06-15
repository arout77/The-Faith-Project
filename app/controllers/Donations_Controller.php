<?php
namespace App\Controller;
use Src\Controller\Base_Controller;

class Donations_Controller extends Base_Controller
{
	public function index()
	{
		// Model was created and stored at: /app/models/DonationsModel.php
		// View was created and stored at: /app/template/views/donations/index.html.twig

		// try {
		// 	$price_money = new \Square\Models\Money();
		// 	$price_money->setAmount( 10000 );
		// 	$price_money->setCurrency( 'USD' );

		// 	$quick_pay = new \Square\Models\QuickPay(
		// 		'Donation',
		// 		$price_money,
		// 		'A9Y43N9ABXZBP'
		// 	);

		// 	$body = new \Square\Models\CreatePaymentLinkRequest();
		// 	$body->setIdempotencyKey( 'cd9e25dc-d9f2-4430-aedb-61605070e95f' );
		// 	$body->setQuickPay( $quick_pay );

		// 	$api_response = $client->getCheckoutApi()->createPaymentLink( $body );

		// 	if ( $api_response->isSuccess() )
		// 	{
		// 		$result = $api_response->getResult();
		// 	}
		// 	else
		// 	{
		// 		$errors = $api_response->getErrors();
		// 	}
		// }
		// catch ( Exception $e )
		// {
		// 	$e->getMessage();
		// }

		$this->template->render( "donations\index.html.twig" );
	}
}