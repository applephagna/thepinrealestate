<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\WebmasterSetting;
use App\Http\Controllers\Controller;

class WebmasterSettingController extends Controller
{
	private $id = 1;

	public function getId()
  {
		return $this->id;
  }

  public function setId($id)
  {
		$this->id = $id;
	}

	public function index()
	{
		return view('admin.settings.general_setting');
  }

	public function editGeneral()
	{
		$id = $this->getId();
		$social = WebmasterSetting::findOrFail($id);
		return view('admin.settings.general_setting',compact('social'));
	}

  public function updateGeneral(Request $request)
  {
		// return $request->all();
    $id = $this->getId();
    $social = WebmasterSetting::find($id);
    if (!empty($social)) {
      $social->facebook_client_id       = $request->login_facebook_client_id;
      $social->facebook_client_secret   = $request->login_facebook_client_secret;
      $social->facebook_client_status   = $request->login_facebook_status;

      $social->twitter_client_id        = $request->login_twitter_client_id;
      $social->twitter_client_secret    = $request->login_twitter_client_secret;
      $social->twitter_client_status    = $request->login_twitter_status;

      $social->google_client_id         = $request->login_google_client_id;
      $social->google_client_secret     = $request->login_google_client_secret;
      $social->google_client_status     = $request->login_google_status;

      $social->linkedin_client_id       = $request->login_linkedin_client_id;
      $social->linkedin_client_secret   = $request->login_linkedin_client_secret;
      $social->linkedin_client_status   = $request->login_linkedin_status;

      $social->github_client_status     = $request->login_github_status;
      $social->github_client_id         = $request->login_github_client_id;
      $social->github_client_secret     = $request->login_github_client_secret;

      $social->bitbucket_client_id      = $request->login_bitbucket_client_id;
      $social->bitbucket_client_secret  = $request->login_bitbucket_client_secret;
      $social->bitbucket_client_status  = $request->login_bitbucket_status;

      $social->nocaptcha_secret         = $request->nocaptcha_secret;
      $social->nocaptcha_sitekey        = $request->nocaptcha_sitekey;
      $social->nocaptcha_status         = $request->nocaptcha_status;

      $social->mail_driver              = $request->mail_driver;
      $social->mail_host                = $request->mail_host;
      $social->mail_port                = $request->mail_port;
      $social->mail_username            = $request->mail_username;
      $social->mail_password            = $request->mail_password;
      $social->mail_encryption          = $request->mail_encryption;
      $social->mail_no_replay           = $request->mail_no_replay;
      // return $request->all();
      // $social->updated_by = 1;
      $social->save();
		// Update .env file
			$env_update = $this->changeEnv([
				'FACEBOOK_STATUS'         => $request->login_facebook_status,
				'FACEBOOK_CLIENT_ID'      => $request->login_facebook_client_id,
				'FACEBOOK_CLIENT_SECRET'  => $request->login_facebook_client_secret,

				'GOOGLE_STATUS'           => $request->login_google_status,
				'GOOGLE_CLIENT_ID'        => $request->login_google_client_id,
				'GOOGLE_CLIENT_SECRET'    => $request->login_google_client_secret,

				'GITHUB_STATUS'           => $request->login_github_status,
				'GITHUB_CLIENT_ID'        => $request->login_github_client_id,
				'GITHUB_CLIENT_SECRET'    => $request->login_github_client_secret,

				'LINKEDIN_STATUS'         => $request->login_linkedin_status,
				'LINKEDIN_CLIENT_ID'      => $request->login_linkedin_client_id,
				'LINKEDIN_CLIENT_SECRET'  => $request->login_linkedin_client_secret,

				'TWITTER_STATUS'          => $request->login_twitter_status,
				'TWITTER_CLIENT_ID'       => $request->login_twitter_client_id,
				'TWITTER_CLIENT_SECRET'   => $request->login_twitter_client_secret,

				'BITBUCKET_STATUS'        => $request->login_bitbucket_status,
				'BITBUCKET_CLIENT_ID'     => $request->login_bitbucket_client_id,
				'BITBUCKET_CLIENT_SECRET' => $request->login_bitbucket_client_secret,

				'NOCAPTCHA_STATUS'        => $request->nocaptcha_status,
				'NOCAPTCHA_SECRET'        => $request->nocaptcha_secret,
				'NOCAPTCHA_SITEKEY'       => $request->nocaptcha_sitekey,

				'MAIL_DRIVER'             => $request->mail_driver,
				'MAIL_HOST'               => $request->mail_host,
				'MAIL_PORT'               => $request->mail_port,
				'MAIL_USERNAME'           => $request->mail_username,
				'MAIL_PASSWORD'           => $request->mail_password,
				'MAIL_ENCRYPTION'         => $request->mail_encryption,
				'NO_REPLAY_EMAIL'         => $request->mail_no_replay,
			]);
				return redirect()->action('Admin\WebmasterSettingController@editGeneral')
				->with('success','General Setting Successfully Save')
				->with('active_tab', $request->active_tab);
			} else {
			return redirect()->route('home');
    }
  }

  public function changeEnv($data = array())
  {
    if(count($data) > 0){
      // Read .env-file
      $env = file_get_contents(base_path() . '/.env');
      // Split string on every " " and write into array
      $env = preg_split('/\s+/', $env);;
      // Loop through given data
      foreach((array)$data as $key => $value){
        // Loop through .env-data
        foreach($env as $env_key => $env_value){
          // Turn the value into an array and stop after the first split
          // So it's not possible to split e.g. the App-Key by accident
          $entry = explode("=", $env_value, 2);
          // Check, if new key fits the actual .env-key
          if($entry[0] == $key){
              // If yes, overwrite it with the new one
              $env[$env_key] = $key . "=" . $value;
          } else {
              // If not, keep the old one
              $env[$env_key] = $env_value;
          }
        }
      }
      // Turn the array back to an String
      $env = implode("\n", $env);
      // And overwrite the .env with the new data
      file_put_contents(base_path() . '/.env', $env);
      return true;
    } else {
      return false;
    }
  }
}
