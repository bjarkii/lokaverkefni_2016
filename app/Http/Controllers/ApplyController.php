<?php namespace App\Http\Controllers;

use Input;
use Validator;
use Redirect;
use Request;
use Session;
use DB;


class ApplyController extends Controller {

  public function upload() {
    // getting all of the post data
    $file = array('song' => Input::file('song'));
    // setting up rules
    $rules = array(
      'song' => 'required|mimes:mp3|max:5242880',
    ); //mimes:jpeg,bmp,png and for max size max:10000
    // doing the validation, passing post data, rules and the messages
    $validator = Validator::make($file, $rules);
    if ($validator->fails()) {
      // send back to the page with the input data and errors
      return Redirect::to('upload')->withInput()->withErrors($validator);
    }
    else {
      // checking file is valid.
      if (Input::file('song')->isValid()) {

        $title = Input::get('title');
        $titleStrip = str_replace(' ', '', $title);
        $desc = Input::get('desc');
        $tags = Input::get('tags');

        $destinationPath = 'uploads'; // upload path
        $extension = Input::file('song')->getClientOriginalExtension(); // getting song extension
        $fileName = $titleStrip . rand(11111,99999).'.'.$extension; // renameing song

        DB::table('songs')->insert(
            ['name' => $title, 'desc' => $desc, 'genre' => '1', 'url' => $fileName, 'pic' => 'test', 'tags' => $tags]
        );

        Input::file('song')->move($destinationPath, $fileName); // uploading file to given path

        // sending back with message
        Session::flash('success', 'You uploaded a new song!');
        return Redirect::to('upload');
      }
      else {
        // sending back with error message.
        Session::flash('error', 'Upload was not processed, please try again');
        return Redirect::to('upload');
      }
    }
  }
}
