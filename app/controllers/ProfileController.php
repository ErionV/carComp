<?php

class ProfileController extends BaseController {

    public function user($username)
    {
        $user = User::whereUsername($username);

        if($user->count())
        {
            $user = $user->first();

            return View::make('profile.user', compact('user'));
        }

        return App::abort(404);
    }
}
