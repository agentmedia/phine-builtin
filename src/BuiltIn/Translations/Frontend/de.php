<?php

use Phine\Framework\Localization\PhpTranslator;
$translator = PhpTranslator::Singleton();
$lang = 'de';
//Simple Register
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.Name', 'Benutzername');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.Name.Validation.Required.Missing','Bitte Benutzernamen eingeben');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.Name.Validation.StringLength.TooShort_{0}', 'Nutzername muss mindesten {0} Zeichen beinhalten');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.Name.Validation.DatabaseCount.TooMuch', 'Nutzername wird schon verwendet');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.EMail', 'E-Mail-Adresse');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.EMail.Validation.Required.Missing', 'Bitte Mailadresse eingeben');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.EMail.Validation.PhpFilter.InvalidEmail', 'Ungültige Mailadresse');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.EMail.Validation.DatabaseCount.TooMuch', 'Mailadresse bereits registriert');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.Password', 'Passwort');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.Password.Validation.Required.Missing', 'Bitte Passwort wählen');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.Password.Validation.StringLength.TooShort_{0}', 'Passwort muss mindestens {0} Zeichen lang sein');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.Terms', 'Hiermit erkläre ich, dass ich die Geschäftsbedingungen gelesen habe und damit einverstanden bin');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.Terms.Validation.Required.Missing', 'Bitte akzeptieren Sie die Geschäftsbedingungen');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.RegisterSubmit', 'Speichern');

//Login
$translator->AddTranslation($lang, 'BuiltIn.Login.Name', 'Nutzername / E-Mail');
$translator->AddTranslation($lang, 'BuiltIn.Login.Password', 'Passwort');
$translator->AddTranslation($lang, 'BuiltIn.Login.LoginSubmit', 'Anmelden');


$translator->AddTranslation($lang, 'BuiltIn.Login.Name.Validation.Required.Missing', 'Bitte Nutzernamen oder E-Mail eingeben');
$translator->AddTranslation($lang, 'BuiltIn.Login.Password.Validation.Required.Missing', 'Passwort eingeben');
$translator->AddTranslation($lang, 'BuiltIn.Login.Access.Validation.Access.NotGranted', 'Die eingegebenen Zugangsdaten sind ungültig');

$translator->AddTranslation($lang, 'BuiltIn.Login.Exception.AlreadyLoggedIn', 'Der Login ist bereits erfolgt');

//Logout
$translator->AddTranslation($lang, 'BuiltIn.Logout.SubmitLogout', 'Ausloggen');

