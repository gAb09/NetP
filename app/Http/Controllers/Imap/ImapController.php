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
		$stream = imap_open("{uranus.o2switch.net:993/imap/SSL}INBOX", "webadmin@natureetprogres09.fr", "N4tu73&P");
		$headers = imap_headers($stream);
		$body = imap_body($stream, '1');
		$list = imap_list($stream, "{uranus.o2switch.net}", "*");
		$mailboxes = imap_getmailboxes($stream, "{uranus.o2switch.net}", "*");
		$close = imap_close ($stream);
		return view('Imap.Imap')->with(compact('list'));
	}

}
