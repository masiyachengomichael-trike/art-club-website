# Deploying ARTCLUB to Render

The site is a PHP application that uses MySQL for member accounts and SMTP to
send sign-in and registration codes. Render's managed database is PostgreSQL,
which this application does not use; provide a MySQL database from a provider
that accepts connections from Render.

## 1. Prepare the MySQL database

Create a database and database user with permission to create and update tables.
Allow connections from your Render service, following your database provider's
network-access instructions. Have the database host, port, name, username, and
password ready.

Run `database/schema.sql` against the database you created. For example, from a
machine with the MySQL client installed:

```powershell
Get-Content database\schema.sql | mysql --host=your-mysql-host --port=3306 --user=your-database-user --password --database=your-database-name
```

Replace the host, port, user, and database-name values with those from your
provider. The command prompts for the database password. The SQL creates the
`members` and `otp_challenges` tables inside the selected database.

## 2. Create the Render web service

1. Push this project to a Git repository connected to Render.
2. In the Render dashboard, create a **Web Service** for that repository.
3. Select **Docker** as the runtime and deploy the `main` branch (or your chosen
   branch). Render will build from the included `Dockerfile`.
4. Set the service's HTTP port to **10000** if Render asks for one. The
   container listens on Render's `PORT` environment variable, defaulting to
   `10000`.

## 3. Set environment variables

In the Render service's **Environment** settings, add the following variables.
Use values from your MySQL provider and SMTP provider; do not commit passwords
or credentials to the repository.

| Variable | Value |
| --- | --- |
| `DB_HOST` | MySQL server hostname |
| `DB_PORT` | MySQL server port (usually `3306`) |
| `DB_NAME` | Name of the database created above |
| `DB_USERNAME` | MySQL database username |
| `DB_PASSWORD` | MySQL database password |
| `DB_SSL_CA` | Optional path to a Render secret file containing your provider's CA certificate |
| `SMTP_HOST` | SMTP server hostname |
| `SMTP_PORT` | SMTP port (commonly `587` for TLS or `465` for SSL) |
| `SMTP_ENCRYPTION` | `tls` for STARTTLS or `ssl` for implicit TLS |
| `SMTP_USERNAME` | SMTP mailbox username |
| `SMTP_PASSWORD` | SMTP mailbox password |
| `SMTP_FROM_EMAIL` | Sender email address permitted by your SMTP provider |
| `SMTP_FROM_NAME` | Sender display name, for example `ARTCLUB` |

If your MySQL provider requires a CA certificate, add it to the Render service
as a [secret file](https://render.com/docs/configure-environment-variables#secret-files)
and set `DB_SSL_CA` to its mounted path.

## 4. Deploy and verify

Save the environment variables and deploy the service. Open the generated
`onrender.com` URL, then check the Render logs if the site or authentication
flows fail. Database connection errors usually mean the host, port, credentials,
network allowlist, or optional CA certificate need attention. SMTP credentials
must also be valid before registration and sign-in emails can be sent.

Render provides HTTPS for the deployed site. Use the HTTPS URL when testing
registration at `/join.php` and sign-in at `/login.php`.

## Local development

The Docker image intentionally excludes `includes/config.local.php`. Local
development can continue to use `includes/config.local.php` as described in
[AUTH_SETUP.md](./AUTH_SETUP.md); the container uses the environment variables
above when that local file is absent.
