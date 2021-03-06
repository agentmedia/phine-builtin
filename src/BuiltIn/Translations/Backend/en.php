<?php

use Phine\Framework\Localization\PhpTranslator;
$translator = PhpTranslator::Singleton();

$lang = 'en';

//Block Form
$translator->AddTranslation($lang, 'BuiltIn.BlockForm.Title', 'Edit HTML Block');
$translator->AddTranslation($lang, 'BuiltIn.BlockForm.Description', 'Adjust the HTML block element and assign class and id properties, here.');
$translator->AddTranslation($lang, 'BuiltIn.BlockForm.Legend', 'HTML Block Settings');
$translator->AddTranslation($lang, 'BuiltIn.BlockForm.TagName', 'Tag Name');
$translator->AddTranslation($lang, 'BuiltIn.BlockForm.Submit', 'Save');

$translator->AddTranslation($lang, 'BuiltIn.BlockForm.TagName.Validation.Required.Missing', 'Select the HTML tag name');


//Container Form
$translator->AddTranslation($lang, 'BuiltIn.ContainerForm.Title', 'Edit Container Element');
$translator->AddTranslation($lang, 'BuiltIn.ContainerForm.Description', 'Here you can choose the container you want to insert. You can also assign css properties and change access rights.');
$translator->AddTranslation($lang, 'BuiltIn.ContainerForm.Legend', 'Container Element Properties');
$translator->AddTranslation($lang, 'BuiltIn.ContainerForm.Container', 'Container Name');
$translator->AddTranslation($lang, 'BuiltIn.ContainerForm.Submit', 'Save');

$translator->AddTranslation($lang, 'BuiltIn.ContainerForm.Container.Validation.Required.Missing', 'Select the container you want to insert');

//html Form
$translator->AddTranslation($lang, 'BuiltIn.HtmlForm.Title', 'Edit HTML Article');
$translator->AddTranslation($lang, 'BuiltIn.HtmlForm.Description', 'Set the text, css properties and access rights of the article, here.');
$translator->AddTranslation($lang, 'BuiltIn.HtmlForm.Legend', 'HTML Article Properties');
$translator->AddTranslation($lang, 'BuiltIn.HtmlForm.Html', 'Text');
$translator->AddTranslation($lang, 'BuiltIn.HtmlForm.Submit', 'Save');

//html wrap Form
$translator->AddTranslation($lang, 'BuiltIn.HtmlWrapForm.Title', 'Edit HTML wrap');
$translator->AddTranslation($lang, 'BuiltIn.HtmlWrapForm.Description', 'Adjust text and properties of the html wrap, here. Each insert variable <strong>{{content::placeholder}}</strong> is replaced with the child element at the matching position.');
$translator->AddTranslation($lang, 'BuiltIn.HtmlWrapForm.Legend', 'HTML Wrap Properties');
$translator->AddTranslation($lang, 'BuiltIn.HtmlWrapForm.Html', 'Text');
$translator->AddTranslation($lang, 'BuiltIn.HtmlWrapForm.Submit', 'Save');

//html code Form
$translator->AddTranslation($lang, 'BuiltIn.HtmlCodeForm.Title', 'Edit HTML Code');
$translator->AddTranslation($lang, 'BuiltIn.HtmlCodeForm.Description', 'This module allows you to insert pure HTML code.');
$translator->AddTranslation($lang, 'BuiltIn.HtmlCodeForm.Legend', 'HTML Code Properties');
$translator->AddTranslation($lang, 'BuiltIn.HtmlCodeForm.Code', 'HTML Code');
$translator->AddTranslation($lang, 'BuiltIn.HtmlCodeForm.Submit', 'Save');
$translator->AddTranslation($lang, 'BuiltIn.HtmlCodeForm.Code.Validation.Required.Missing', 'Insert your HTML code');

//navigation form
$translator->AddTranslation($lang, 'BuiltIn.NavigationForm.Title', 'Edit Navigation');
$translator->AddTranslation($lang, 'BuiltIn.NavigationForm.Description', 'Insert a navigation with fully customizable links, here.');
$translator->AddTranslation($lang, 'BuiltIn.NavigationForm.Legend', 'Navigation Properties');
$translator->AddTranslation($lang, 'BuiltIn.NavigationForm.Name', 'Name');
$translator->AddTranslation($lang, 'BuiltIn.NavigationForm.Name.Validation.Required.Missing', 'Insert the menu name');
$translator->AddTranslation($lang, 'BuiltIn.NavigationForm.Submit', 'Save & Continue');

//navigation tree
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.Title', 'Navigation tree');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.Description', 'Here you can gather the items to be linked in your menu');

$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.Back', 'Back To Contents');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.CreateStartItem', 'Create top item');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.CreateIn', 'Create new item into this one');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.CreateAfter', 'Create new item after this one');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.InsertIn', 'Insert item into this one');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.InsertAfter', 'Insert item after this one');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.Cut', 'Cut item');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.Edit', 'Edit item');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.CancelCut', 'Cancel moving operation');
$translator->AddTranslation($lang, 'BuiltIn.NavigationTree.Delete', 'Delete item');


//navigation item form
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Title', 'Edit navigation item');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Description', 'Add or edit an external or external link to the navigation');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Legend', 'Item Settings');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Type', 'Type');

$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Name', 'Display Name');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItem.Type.UrlItem', 'External URL');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItem.Type.PageItem', 'Internal Page');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.PageItem', 'Linked Page');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Submit', 'Save');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Url', 'URL Address');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.PageItem.Validation.Required.Missing', 'Select a page url');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Name.Validation.Required.Missing', 'Enter a name as link text');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Url.Validation.Required.Missing', 'Link target is missing');
$translator->AddTranslation($lang, 'BuiltIn.NavigationItemForm.Url.Validation.PhpFilter.InvalidUrl', 'This is no valid internet address');

//Register simple form
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimple.BackendName', 'Registration Form');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Title', 'Registration Form');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Description', 'You can edit the register form, here. It contains field elements for e-mail, login name, password and a terms checkbox.');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Legend', 'Form Settings');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.NextUrl', 'Redirect Page');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.NextUrl.Validation.Required.Missing', 'Select redirect page after submit');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.ConfirmUrl', 'Confirm Page');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.ConfirmUrl.Validation.Required.Missing', 'Select confirm url');

$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.MailFrom', 'Confirm Sender');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.MailFrom.Validation.Required.Missing', 'Insert address of confirm mail sender');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.MailFrom.Validation.PhpFilter.InvalidEmail', 'Invalid e-mail address');

$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.MailSubject', 'Subject');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.MailSubject.Validation.Required.Missing', 'Insert mail subject');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.MailText1', 'Mail Text above Confirm Link');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.MailText1.Validation.Required.Missing', 'Insert some explanational text for the confirm link');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.MailText2', 'Mail Text below Confirm Link');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.MailStyles', 'Mail CSS Definitions');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Name', 'Name label');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Name-Validation-Required-Missing', 'Message name required');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Name-Validation-StringLength-TooShort_{0}', 'Message name too short');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Name-Validation-DatabaseCount-TooMuch', 'Message name in use');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.EMail', 'E-mail label');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.EMail-Validation-Required-Missing', 'Message e-mail required');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.EMail-Validation-PhpFilter-InvalidEmail', 'Message e-mail invalid');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.EMail-Validation-DatabaseCount-TooMuch', 'Message e-mail in use');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Password', 'Password label');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Password-Validation-Required-Missing', 'Message password required');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Password-Validation-StringLength-TooShort_{0}', 'Message password too short');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Terms', 'Terms label');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Terms-Validation-Required-Missing', 'Message Terms unchecked');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.RegisterSubmit', 'Button label');
$translator->AddTranslation($lang, 'BuiltIn.RegisterSimpleForm.Submit', 'Save');
        
//Registration confirm
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirm.BackendName', 'Registration Confirmation');
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.Title', 'Registration Confirmation');
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.Description', 'Define the behavior of the system when the registration link is clicked.');
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.Legend', 'Confirmation Settings');
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.SuccessUrl', 'Next Page Correct Link');
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.ErrorUrl', 'Next Page Incorrect Link');
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.Activate', 'Activate Acces'); 
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.Group', 'Assign Group(s)');
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.Success', 'Message confirmation success');
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.Error', 'Message confirmation failure');
$translator->AddTranslation($lang, 'BuiltIn.RegisterConfirmForm.Submit', 'Save');

//Login Form
$translator->AddTranslation($lang, 'BuiltIn.Login.BackendName', 'Login');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Title', 'Login Form');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Description', 'Set up the look and behavior of the login form, here.');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Legend', 'Login Form Settings');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.NextUrl', 'Page after Login');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.PasswordUrl', 'Page Password Lost');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Submit', 'Save');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Name', 'Label account name');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Name-Validation-Required-Missing', 'Message account name missing');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Password', 'Label password');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Password-Validation-Required-Missing', 'Message password missing');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Password-Link_{0}', 'Text & link password lost');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.Access-Validation-Access-NotGranted', 'Message login failure');
$translator->AddTranslation($lang, 'BuiltIn.LoginForm.LoginSubmit', 'Button label');

//Repeater form
$translator->AddTranslation($lang, 'BuiltIn.RepeaterForm.Title', 'Repeater');
$translator->AddTranslation($lang, 'BuiltIn.RepeaterForm.Description', 'The Repeater renders its child elements in a loop. By creating your custom template (follow the menu item in core functions), you can create lists with a specific HTML construction.');
$translator->AddTranslation($lang, 'BuiltIn.RepeaterForm.Legend', 'Repeater Settings');
$translator->AddTranslation($lang, 'BuiltIn.RepeaterForm.Submit', 'Save');

//Logout (form)
$translator->AddTranslation($lang, 'BuiltIn.Logout.BackendName', '<Logout Button>');
$translator->AddTranslation($lang, 'BuiltIn.LogoutForm.Title', 'Logout Formular / Link');
$translator->AddTranslation($lang, 'BuiltIn.LogoutForm.Description', 'Here you can define the logout button.');
$translator->AddTranslation($lang, 'BuiltIn.LogoutForm.Legend', 'Settings');
$translator->AddTranslation($lang, 'BuiltIn.LogoutForm.NextUrl', 'Page after logout');
$translator->AddTranslation($lang, 'BuiltIn.LogoutForm.SubmitLogout', 'Button Text');
$translator->AddTranslation($lang, 'BuiltIn.LogoutForm.Submit', 'Save');
//ChangePasswordForm
$translator->AddTranslation($lang, 'BuiltIn.ChangePassword.BackendName', 'Password Reminder Form');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.Title', 'Set New Password');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.Description', 'Using this element, a member can request a new password.');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.Legend', 'Settings');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.NextUrl', 'URL After Form Submit');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.ConfirmUrl', 'Base URL in Confirmation Mail');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.MailFrom', 'Mail Sender');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.MailSubject', 'Mail Subject');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.MailText1', 'Mail Text Before Confirm Link');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.MailText2', 'Mail Text After Confirm Link');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.MailStyles', 'CSS-Styles in E-Mail');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.Submit', 'Save');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.NextUrl.Validation.Required.Missing', 'Next URL required');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.ConfirmUrl.Validation.Required.Missing', 'Please Set confirmation URL');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.MailFrom.Validation.Required.Missing', 'Mail sender required');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.MailFrom.Validation.PhpFilter.InvalidEmail', 'Please insert valid e-mail address');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.MailText1.Validation.Required.Missing', 'Insert a leading text, please');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.MailSubject.Validation.Required.Missing', 'Subject is required');

$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.Name', 'Field Label Username/E-Mail');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.Name-Validation-Required-Missing', 'Error message Name/E-Mail missing');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.Name-Validation-DatabaseCount-TooFew', 'Error message Name/E-Mail not found');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordForm.ChangePasswordSubmit', 'Button Label');

//Change Password Confirm Form

$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.Title', 'Reset Password Form');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirm.BackendName', 'Reset Password Form');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.Description', 'Adjust the form to reset the password, here!');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.Legend', 'Settings');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.SuccessUrl', 'Redirect URL on success');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.ErrorUrl', 'Redirect URL on error');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.Success', 'Message on Success');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.Error', 'Message on incorrect access');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.Password', 'Label password field');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.Password-Validation-Required-Missing', 'Error message missing password');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.PasswordRepeat', 'Label password repeat field');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.PasswordRepeat-Validation-Required-Missing', 'Error message password not repeated');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.PasswordRepeat-Validation-CompareCheck-EqualsNot_{0}', 'Passwords are not equal');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.PasswordChangeSubmit', 'Button-Label');
$translator->AddTranslation($lang, 'BuiltIn.ChangePasswordConfirmForm.Submit', 'Save');

//Change E-Mail Confirm Form
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailConfirmForm.Title', 'Confirm New E-Mail');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailConfirm.BackendName', 'Confirm New E-Mail');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailConfirmForm.Description', 'Include this element on the page for confirming a new e-mail.');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailConfirmForm.Legend', 'Settings');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailConfirmForm.SuccessUrl', 'Redirect URL on success');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailConfirmForm.ErrorUrl', 'Redirect URL on error');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailConfirmForm.Submit', 'Save');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailConfirmForm.Success', 'Message on successful change');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailConfirmForm.Error', 'Message on incorrect access');

//Change EMail form
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.Title', 'Form To Reset E-Mail');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMail.BackendName', 'Form To Reset E-Mail');

$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.Description', 'This is a form that allows members to change their e-mails. The change request ist stored in the database, and comes into effect after confirmation of a link, mailed to the new address.');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.Legend', 'Settings');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.NextUrl', 'Next URL After Submit');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.NextUrl.Validation.Required.Missing', 'Next URL required');

$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.ConfirmUrl', 'Confirmation URL');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.ConfirmUrl.Validation.Required.Missing', 'Confirmation URL required');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.MailFrom', 'Sender E-Mail Address');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.MailFrom.Validation.Required.Missing', 'Sender address required');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.MailFrom.Validation.PhpFilter.InvalidEmail', 'Invalid e-mail address');

$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.MailSubject', 'Mail Subject');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.MailSubject.Validation.Required.Missing', 'Subject required');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.MailText1', 'Mail Text Before Confirm Link');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.MailText1.Validation.Required.Missing', 'Please insert some introducing words');

$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.MailText2', 'Mail Text After Confirm Link');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.MailStyles', 'Mail CSS Styles');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.Submit', 'Save');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.NewEMail', 'Field label New E-Mail Address');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.NewEMail-Validation-Required-Missing', 'Error message new e-mail address required');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.NewEMail-Validation-PhpFilter-InvalidEmail', 'Error message invalid e-mail address');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.NewEMail.Validation-DatabaseCount-TooMuch', 'Error message address already exists');
$translator->AddTranslation($lang, 'BuiltIn.ChangeEMailForm.ChangeEMailSubmit', 'Button Label');