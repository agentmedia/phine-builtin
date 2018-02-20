<?php

use Phine\Framework\Localization\PhpTranslator;
$translator = PhpTranslator::Singleton();
$lang = 'de';
//Block Form
$translator->AddTranslation($lang, 'BuiltIn.BlockForm.Title', 'HTML-Blockelement bearbeiten');
$translator->AddTranslation($lang, 'BuiltIn.BlockForm.Description', 'Passen Sie hier die HTML-Eigenschaften des Blockelementes an.');
$translator->AddTranslation($lang, 'BuiltIn.BlockForm.Legend', 'HTML-Block-Einstellungen');
$translator->AddTranslation($lang, 'BuiltIn.BlockForm.TagName', 'Tag-Name');
$translator->AddTranslation($lang, 'BuiltIn.BlockForm.Submit', 'Speichern');
$translator->AddTranslation($lang, 'BuiltIn.BlockForm.TagName.Validation.Required.Missing', 'Tag-Namen wählen');


//Container Form
$translator->AddTranslation($lang, 'BuiltIn.ContainerForm.Title', 'Container-Element bearbeiten');
$translator->AddTranslation($lang, 'BuiltIn.ContainerForm.Description', 'Wählen Sie den Container aus, den Sie einfügen möchten und bestimmen Sie die CSS-Eigenschaften. Auch Zugriffsrechte lassen sich einstellen.');
$translator->AddTranslation($lang, 'BuiltIn.ContainerForm.Legend', 'Container-Element-Eigenschaften');
$translator->AddTranslation($lang, 'BuiltIn.ContainerForm.Container', 'Container Name');
$translator->AddTranslation($lang, 'BuiltIn.ContainerForm.Submit', 'Speichern');

$translator->AddTranslation($lang, 'BuiltIn.ContainerForm.Container.Validation.Required.Missing', 'Wählen Sie den Container, der eingefügt werden soll.');

//html Form
$translator->AddTranslation($lang, 'BuiltIn.HtmlForm.Title', 'HTML-Artikel bearbeiten');
$translator->AddTranslation($lang, 'BuiltIn.HtmlForm.Description', 'Füllen Sie den Artikel hier mit Text und weisen Sie ihm CSS-Eigenschaften oder Zugriffsrechte zu.');
$translator->AddTranslation($lang, 'BuiltIn.HtmlForm.Legend', 'HTML-Artikel-Eigenschaften');
$translator->AddTranslation($lang, 'BuiltIn.HtmlForm.Html', 'Text');
$translator->AddTranslation($lang, 'BuiltIn.HtmlForm.Submit', 'Speichern');

//html wrap Form
$translator->AddTranslation($lang, 'BuiltIn.HtmlWrapForm.Title', 'HTML-Wrap bearbeiten');
$translator->AddTranslation($lang, 'BuiltIn.HtmlWrapForm.Description', 'Passen Sie hier Text und Eigenschaften des HTML-Wraps an. Jede Insert-Variable des Typs <strong>&#x007B;&#x007B;content::placeholder&#x007D;&#x007D;</strong> wird durch das Unterelement an entsprechender Position ersetzt.');
$translator->AddTranslation($lang, 'BuiltIn.HtmlWrapForm.Legend', 'HTML-Wrap-Eigenschaften');
$translator->AddTranslation($lang, 'BuiltIn.HtmlWrapForm.Html', 'Text');
$translator->AddTranslation($lang, 'BuiltIn.HtmlWrapForm.Submit', 'Speichern');

//html code Form
$translator->AddTranslation($lang, 'BuiltIn.HtmlCodeForm.Title', 'HTML-Code bearbeiten');
$translator->AddTranslation($lang, 'BuiltIn.HtmlCodeForm.Description', 'Hier können Sie HTML-Quellcode einfügen.');
$translator->AddTranslation($lang, 'BuiltIn.HtmlCodeForm.Legend', 'HTML-Code-Eigenschaften');
$translator->AddTranslation($lang, 'BuiltIn.HtmlCodeForm.Code', 'HTML-Code');
$translator->AddTranslation($lang, 'BuiltIn.HtmlCodeForm.Submit', 'Speichern');
$translator->AddTranslation($lang, 'BuiltIn.HtmlCodeForm.Code.Validation.Required.Missing', 'Fügen Sie den HTML-Code ein.');

//navigation form
$translator->AddTranslation($lang, 'BuiltIn.NavigationForm.Title', 'Navigation bearbeiten');
$translator->AddTranslation($lang, 'BuiltIn.NavigationForm.Description', 'Hier stellen Sie ein Menü ein, dass frei setzbare Links enthält.');
$translator->AddTranslation($lang, 'BuiltIn.NavigationForm.Legend', 'Navigationseigenschaften');
$translator->AddTranslation($lang, 'BuiltIn.NavigationForm.Name', 'Name');
$translator->AddTranslation($lang, 'BuiltIn.NavigationForm.Name.Validation.Required.Missing', 'Fügen Sie den Namen des Menüs ein');
$translator->AddTranslation($lang, 'BuiltIn.NavigationForm.Submit', 'Speichern & Weiter');

//navigation tree
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.Title', 'Navigationseinträge');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.Description', 'Fügen Sie Ihrem Menü hier interne Seiten und externe Links hinzu.');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.Back', 'Zurück zur Inhaltsliste');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.CreateStartItem', 'Obersten Eintrag hinzufügen');

$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.CreateIn', 'Neuen Eintrag innerhalb einfügen');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.CreateAfter', 'Neuen Eintrag hiernach einfügen');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.InsertIn', 'Innerhalb dieses Eintrages einfügen');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.InsertAfter', 'Nach diesem Eintrag einfügen');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.Cut', 'Element ausschneiden');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.Edit', 'Element bearbeiten');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.CancelCut', 'Verschieben des Eintrages abbrechen');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.Delete', 'Eintrag löschen');

//navigation item form
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Title', 'Menü-Eintrag bearbeitenn');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Description', 'Bearbeiten Sie hier den internen oder externen Link im Menü.');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Legend', 'Eintragseinstellungen');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Type', 'Typ');

$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Name', 'Anzeigename');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItem.Type.UrlItem', 'Externe URL');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItem.Type.PageItem', 'Interne Seite');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.PageItem', 'Verknüpfte Seite');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Submit', 'Speichern');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Url', 'Webadresse');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.PageItem.Validation.Required.Missing', 'Wählen Sie eine Zielseite aus');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Name.Validation.Required.Missing', 'Geben Sie einen Linktext ein');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Url.Validation.Required.Missing', 'Das Link-Ziel fehlt');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Url.Validation.PhpFilter.InvalidUrl', 'Dies ist keine gültige Webadresse');

//Register simple form
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.BackendName', 'Formular Registrierung');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Title', 'Registrierungsformular');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Description', 'Bearbeiten Sie hier das Registrierungsformular. Es beinhaltet die Feldelemente E-Mail, Name, Passwort und Geschäftsbedingungen als Checkbox.');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Legend', 'Formular-Einstellungen');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.NextUrl', 'Weiterleitungsseite');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.NextUrl.Validation.Required.Missing', 'Weiterleitung nach Absenden festlegen');

$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.ConfirmUrl', 'Bestätigungsseite');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.ConfirmUrl.Validation.Required.Missing', 'Bestätigungsseite wählen');

$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.MailFrom', 'Absender Bestätigung');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.MailFrom.Validation.Required.Missing', 'Absender-EMail angeben');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.MailFrom.Validation.PhpFilter.InvalidEmail', 'E-Mail-Adresse ungültig');

$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.MailSubject', 'Betreff');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.MailSubject.Validation.Required.Missing', 'Mail-Betreff eingeben');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.MailText1', 'Mailtext vor Bestätigungslink');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.MailText1.Validation.Required.Missing', 'Erläuterungstext zur Mail-Bestätigung eingeben');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.MailText2', 'Mailtext nach Bestätigungslink');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.MailStyles', 'Mail-CSS-Angaben');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Name', 'Label Name');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Name-Validation-Required-Missing', 'Meldung Name erforderlich');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Name-Validation-StringLength-TooShort_{0}', 'Meldung Name zu kurz');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Name-Validation-DatabaseCount-TooMuch', 'Meldung Name bereits vergeben');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.EMail', 'Label E-Mail');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.EMail-Validation-Required-Missing', 'Meldung E-Mail erforderlich');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.EMail-Validation-PhpFilter-InvalidEmail', 'Meldung E-Mail ungültig');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.EMail-Validation-DatabaseCount-TooMuch', 'Meldung E-Mail bereits vergeben');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Password', 'Label Passwort');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Password-Validation-Required-Missing', 'Meldung Passwort erforderlich');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Password-Validation-StringLength-TooShort_{0}', 'Meldung Passwort zu kurz');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Terms', 'Label Geschäftsbedingungen');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Terms-Validation-Required-Missing', 'Meldung Geschäftsbedingungen unbestätigt');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.RegisterSubmit', 'Button-Label');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Submit', 'Speichern');

//Registration confirm
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirm.BackendName', 'Registrierungsbestätigung');
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.Title', 'Registrierungsbestätigung');
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.Description', 'Legen Sie hier fest, was passiert wenn der Link aus der Mailbestätigung angeklickt wurde.');
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.Legend', 'Bestätigungseinstellungen');
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.SuccessUrl', 'Folge-Seite korrekter Link');
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.ErrorUrl', 'Folge-Seite abgelaufener Link');
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.Activate', 'Zugang aktivieren'); 
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.Group', 'Gruppe(n) zuweisen');
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.Success', 'Meldung Bestätigung erfolgreich');
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.Error', 'Meldung Link abgelaufen');
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.Submit', 'Speichern');

//Login Form
$translator->AddTranslation($lang, 'BuiltIn.Login.BackendName', 'Login');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Title', 'Login-Formular');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Description', 'Legen Sie hier Aussehen und Verhalten der Anmeldung fest.');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Legend', 'Login-Formulareinstellungen');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.NextUrl', 'Seite nach Anmeldung');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.PasswordUrl', 'Seite Passwort vergessen');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Submit', 'Speichern');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Name', 'Label Nutzerkennung');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Name-Validation-Required-Missing', 'Meldung Nutzerkennung fehlt');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Password', 'Label Passwort');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Password-Validation-Required-Missing', 'Meldung Passwort fehlt');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Password-Link_{0}', 'Text & Link Passwort vergessen');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Access-Validation-Access-NotGranted', 'Meldung Login nicht erfolgreich');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.LoginSubmit', 'Button-Label');

//Repeater form
$translator->AddTranslation($lang, 'BuiltIn.RepeaterForm.Title', 'Repeater');
$translator->AddTranslation($lang, 'BuiltIn.RepeaterForm.Description', 'Der Repeater stellt seine Unterelemente nacheinander dar. Mit einem angepassten Template (siehe entsprechender Basisfunktion) erstellen Sie so Listen mit immer vorgegebenen HTML-Aufbau.');
$translator->AddTranslation($lang, 'BuiltIn.RepeaterForm.Legend', 'Repeater-Einstellungen');
$translator->AddTranslation($lang, 'BuiltIn.RepeaterForm.Submit', 'Speichern');

//Logout (form)
$translator->AddTranslation($lang, 'BuiltIn.Logout.BackendName', '<Logout-Button>');
$translator->AddTranslation($lang, 'BuiltIn.LogoutForm.Title', 'Logout-Formular / Link');
$translator->AddTranslation($lang, 'BuiltIn.LogoutForm.Description', 'Definieren Sie hier den Abmelde-Button');
$translator->AddTranslation($lang, 'BuiltIn.LogoutForm.Legend', 'Einstellungen');
$translator->AddTranslation($lang, 'BuiltIn.LogoutForm.NextUrl', 'Seite nach Abmelden');
$translator->AddTranslation($lang, 'BuiltIn.LogoutForm.SubmitLogout', 'Button-Text');
$translator->AddTranslation($lang, 'BuiltIn.LogoutForm.Submit', 'Speichern');

//ChangePasswordForm
$translator->AddTranslation($lang, 'BuiltIn.ChangePassword.BackendName', 'Formular Passwort vergessen');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.Title', 'Passwort Neu Setzen');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.Description', 'Mit Hilfe dieses Elementes kann der User die Neusetzung seines Passwortes per Mail anfordern.');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.Legend', 'Einstellungen');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.NextUrl', 'URL Nach Formularversand');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.ConfirmUrl', 'Basis-URL in Bestätigungsmail');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.MailFrom', 'Mail-Absender');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.MailSubject', 'Mail-Betreff');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.MailText1', 'Mail-Text vor Bestätigungslink');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.MailText2', 'Mail-Text nach Bestätigungslink');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.MailStyles', 'CSS-Stile in der Mail');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.Submit', 'Speichern');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.NextUrl.Validation.Required.Missing', 'Bitte Folge-URL setzen');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.ConfirmUrl.Validation.Required.Missing', 'Bitte Bestätigungs-URL setzen');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.MailFrom.Validation.Required.Missing', 'Bitte Absendeadresse setzen');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.MailFrom.Validation.PhpFilter.InvalidEmail', 'Bitte gültige E-Mail verwenden');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.MailText1.Validation.Required.Missing', 'Bitte Einführungstext der Mail eingeben');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.MailSubject.Validation.Required.Missing', 'Bitte Betreff angeben');

$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.Name', 'Feld-Label Username/E-Mail');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.Name-Validation-Required-Missing', 'Fehlermeldung Name/E-Mail nich ausgefüllt');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.Name-Validation-DatabaseCount-TooFew', 'Fehlermeldung Name/E-Mail nicht gefunden');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.ChangePasswordSubmit', 'Button-Label');

//Change Password Confirm Form
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.Title', 'Passwort neu setzen');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirm.BackendName', 'Formular Passwort neu setzen');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.Description', 'Passen Sie hier das Formular für ein neues Passwort an.');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.Legend', 'Einstellungen');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.SuccessUrl', 'Nächste URL bei Erfolg');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.ErrorUrl', 'Nächste URL bei Fehler');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.Success', 'Meldung bei erfolgreicher Änderung');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.Error', 'Meldung bei fehlerhaftem Zugriff');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.Password', 'Label Passwort-Feld');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.Password-Validation-Required-Missing', 'Fehlermeldung fehlende Passworteingabe');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.PasswordRepeat', 'Label Passwort Wiederholen-Feld');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.PasswordRepeat-Validation-Required-Missing', 'Fehlermeldung Passwort nicht wiederholt');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.PasswordRepeat-Validation-CompareCheck-EqualsNot_{0}', 'Passwörter stimmen nicht überein');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.PasswordChangeSubmit', 'Button-Label');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.Submit', 'Speichern');

//Change E-Mail Confirm Form
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailConfirmForm.Title', 'Bestätigung Neue E-Mail');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailConfirm.BackendName', 'Bestätigung Neue E-Mail');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailConfirmForm.Description', 'Dieses Element wird auf der Seite eingebunden, wo eine neu gesetzte Mail bestätigt werden soll.');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailConfirmForm.Legend', 'Einstellungen');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailConfirmForm.SuccessUrl', 'Nächste URL bei Erfolg');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailConfirmForm.ErrorUrl', 'Nächste URL bei Fehler');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailConfirmForm.Submit', 'Speichern');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailConfirmForm.Success', 'Meldung bei erfolgreicher Änderung');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailConfirmForm.Error', 'Meldung bei fehlerhaftem Zugriff');

//Change EMail form
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.Title', 'Formular Neue E-Mail-Adresse');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMail.BackendName', 'Formular Neue E-Mail-Adresse');

$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.Description', 'Ein Formular zur Änderung der Nutzer-E-Mail-Adresse. Die Änderungsanfrage wird in der Datenbank vermerkt, wird aber erst nach Mail-Bestätigung wirksam.');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.Legend', 'Einstellungen');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.NextUrl', 'URL nach Absenden');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.NextUrl.Validation.Required.Missing', 'Folge-URL muss angegeben werden');

$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.ConfirmUrl', 'Basis-URL zur Bestätigung');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.ConfirmUrl.Validation.Required.Missing', 'Bestätigungs-URL muss angegeben werden');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.MailFrom', 'Absender-Mailadresse');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.MailFrom.Validation.Required.Missing', 'Absender muss angegeben werden');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.MailFrom.Validation.PhpFilter.InvalidEmail', 'Ungültige Mailadresse');

$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.MailSubject', 'Mail-Betreff');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.MailSubject.Validation.Required.Missing', 'Betreff muss angegeben werden');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.MailText1', 'Mail-Text vor Bestätigungslink');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.MailText1.Validation.Required.Missing', 'Bitte Einführungstext eingeben');

$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.MailText2', 'Mail-Text nach Bestätigungslink');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.MailStyles', 'Mail-CSS-Stile');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.Submit', 'Speichern');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.NewEMail', 'Feld-Label Neue E-Mailadresse');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.NewEMail-Validation-Required-Missing', 'Fehlermeldung Mail-Adresse nich eingegeben');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.NewEMail-Validation-PhpFilter-InvalidEmail', 'Fehlermeldung ungültige Mailadresse');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.NewEMail.Validation-DatabaseCount-TooMuch', 'Fehlermeldung Mailadresse bereits eingetragen');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.ChangeEMailSubmit', 'Button-Label');
