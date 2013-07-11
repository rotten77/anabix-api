Anabix PHP API
==============

PHP API for Anabix CRM

API manual: http://anabix.cz/api.pdf


## Examples

### Settings

```php
include "./anabix.api.php";

$anabix = new Anabix;
$anabix->user = ""; // your API username
$anabix->token = ""; // your API token
$anabix->api = "https://YOUR_ACCOUNT.anabix.cz/api";
```

### Get all organizations

```php
$allOrganizations = $anabix->request('organizations', 'getAll');
```

### Get user by e-mail

```php
$data = array(
	'criteria' => array("email" => 'honza@optimal-marketing.cz'),
);
$getUser = $createActivity = $anabix->request('contacts', 'getAll', $data);
```

#### ...and add a activity for him

```php
	foreach($getUser['data'] as $contact) {

		$data = array(
			"idContact" => $contact['idContact'],
			"title" => "New activity",
			"body" => "Info about new activity",
			"type" => "note",
			"timestamp" => strtotime("now")
		);

		$createActivity = $anabix->request('activities', 'create', $data);

	}
```