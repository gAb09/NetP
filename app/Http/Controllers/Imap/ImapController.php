<?php namespace App\Http\Controllers\Imap;

use App\Http\Controllers\Controller;

class ImapController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	// public function __construct()
	// {
	// 	$this->middleware('guest');
	// }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{


		/* - - - - - - -  Gmail - - - - - -  */

		$stream = imap_open("{uranus.o2switch.net:993/imap/SSL}INBOX", "webadmin@natureetprogres09.fr", "N4tu73&P");
		$check = imap_check($stream);
		$list = imap_list($stream, "{uranus.o2switch.net}", "*");
		$getmailboxes = imap_getmailboxes($stream, "{uranus.o2switch.net}", "*");
		$headers = imap_headers($stream);
		$num_msg = imap_num_msg($stream);
		$status = imap_status($stream, "{uranus.o2switch.net:993/imap/SSL}INBOX", SA_ALL);
		$messages = imap_fetch_overview($stream, "1:".$num_msg);
		$body = imap_body($stream, '1');



		$close = imap_close ($stream);

		$errors = imap_errors();

		return view('Imap.Imap')
		->with(compact('resource'))
		->with(compact('check'))
		->with(compact('list'))
		->with(compact('getmailboxes'))
		->with(compact('headers'))
		->with(compact('num_msg'))
		->with(compact('status'))
		->with(compact('errors'))
		->with(compact('messages'))
		->with(compact('body'))
		;
	}




	public function free($util)
	{

		$stream = imap_open("{imap.club-internet.fr:993/imap/SSL}", $util, "wrasuxwr");
		var_dump($stream);

		$check = imap_check($stream);

		$list = imap_list($stream, "{imap.club-internet.fr}", "*");

		imap_createmailbox($stream, '{imap.club-internet.fr}brubru');

		$getmailboxes = imap_getmailboxes($stream, "{imap.club-internet.fr}", "*");

		$headers = imap_headers($stream);

		$num_msg = imap_num_msg($stream);

		$status = imap_status($stream, "{imap.club-internet.fr:993/imap/SSL}INBOX", SA_ALL);

		$messages = imap_fetch_overview($stream, "1:".$num_msg);
		
		$structure = imap_fetchstructure($stream, 2);

		$body = utf8_encode(quoted_printable_decode(imap_body($stream, '2')));
		
		// imap_delete($stream, '1');
		// imap_expunge($stream);

		return view('Imap.Imap')
		->with(compact('resource'))
		->with(compact('check'))
		->with(compact('list'))
		->with(compact('getmailboxes'))
		->with(compact('headers'))
		->with(compact('num_msg'))
		->with(compact('status'))
		->with(compact('errors'))
		->with(compact('messages'))
		->with(compact('structure'))
		->with(compact('body'))
		;
	}

}
