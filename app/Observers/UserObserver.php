<?php

namespace App\Observers;

class UserObserver
{
    public function creating(User $user)
    {
        $user->username = strtolower($user->username);
    }

    public function created(User $user)
    {
        // ارسال ایمیل پس از ثبت‌ نام کاربر
        Mail::to($user->email)->send(new WelcomeMail($user));
    }

}
