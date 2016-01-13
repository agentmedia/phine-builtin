<?php

use Phine\Framework\Localization\PhpTranslator;
$translator = PhpTranslator::Singleton();
$lang = 'en';
//Simple Register
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.Name', 'Login Name');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.Name.Validation.Required.Missing','Please insert a user name');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.Name.Validation.StringLength.TooShort_{0}', 'User name requires at least {0} characters');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.Name.Validation.DatabaseCount.TooMuch', 'User name is already in use');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.EMail', 'E-Mail-Adresse');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.EMail.Validation.Required.Missing', 'Please insert e-mail address');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.EMail.Validation.PhpFilter.InvalidEmail', 'Invalid e-mail address');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.EMail.Validation.DatabaseCount.TooMuch', 'E-mail address already in use');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.Password', 'Password');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.Password.Validation.Required.Missing', 'Please choose a password');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.Password.Validation.StringLength.TooShort_{0}', 'Password requires minimum length of {0} characters');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.Terms', 'I have read the terms and agree with them.');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.Terms.Validation.Required.Missing', 'Please accept our terms');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.RegisterSubmit', 'Save');

//Login
$translator->AddTranslation($lang, 'BuiltIn.Login.Name', 'Username / E-Mail');
$translator->AddTranslation($lang, 'BuiltIn.Login.Password', 'Password');
$translator->AddTranslation($lang, 'BuiltIn.Login.LoginSubmit', 'Log In');

$translator->AddTranslation($lang, 'BuiltIn.Login.Name.Validation.Required.Missing', 'Please enter username or e-mail address');
$translator->AddTranslation($lang, 'BuiltIn.Login.Password.Validation.Required.Missing', 'Please enter password');
$translator->AddTranslation($lang, 'BuiltIn.Login.Access.Validation.Access.NotGranted', 'You entered invalid credentials');


$translator->AddTranslation($lang, 'BuiltIn.Login.Exception.AlreadyLoggedIn', 'You are already logged in');

//Logout
$translator->AddTranslation($lang, 'BuiltIn.Logout.SubmitLogout', 'Log out');