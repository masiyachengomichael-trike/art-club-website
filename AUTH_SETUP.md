# ARTCLUB email OTP setup

Member registration and sign-in use email verification codes. A new member is
created only after the registration code is verified. Codes expire after 10
minutes, are stored hashed, allow five attempts, and can be resent once per
minute.

## 1. Create the database

Create an `artclub` database in phpMyAdmin, select it, and import
`database/schema.sql`. The script creates the `members` and `otp_challenges`
tables in the selected database.

## 2. Configure database and hosting SMTP

Copy `includes/config.local.php.example` to `includes/config.local.php`. On
Windows, run `Copy-Item includes\config.local.php.example
includes\config.local.php` from the project folder. Enter your database
credentials and the SMTP settings supplied by your web host:

- SMTP host and port
- Encryption: `tls` for STARTTLS (commonly port 587), or `ssl` for implicit TLS
  (commonly port 465)
- SMTP mailbox username and password
- A sender email address permitted by your hosting provider

Keep `includes/config.local.php` private. It is excluded from Git, and
`includes/.htaccess` blocks direct web requests to it. Do not paste SMTP
passwords into chat or public files. Configure a trusted HTTPS connection
before using member accounts on a public site.

## 3. Test the flow

Open `join.php`, submit an application, and enter the code delivered to the
provided email address. After successful verification, the member is logged in
and redirected to `member.php`. Existing members can use `login.php` to request
a sign-in code. Sign-out is available from the member page.
