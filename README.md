### How to use Subuno SDK: ###
##### 1. Create configuration class that implements ConfigInterface #####
```php
class TestConfig implements \PandaGroup\SubunoApi\Contract\ConfigInterface
```
You can save your api keys in database, env file, and wherever you want - the most important is to return it in the Configuration class.
##### 2. Create new client: #####
```php
$config = new TestConfig();
$client = new \PandaGroup\SubunoApi\Client($config)
```
##### 3. Invoke method execute on client with selected params in argument 'query': #####
```php
$client->execute(['t_id' => 213]);
```
##### 4. You can also use QueryBuilder and DataObjects (which is recommended) to build request that will be send to Subuno API. There are three types of data objects that represents different types of information proceed by Subuno API: #####
```php
\PandaGroup\SubunoApi\DataObject\BillingInformation
\PandaGroup\SubunoApi\DataObject\OrderInformation
\PandaGroup\SubunoApi\DataObject\ShippingInformation
```
Use Factory class to create new data objects:
```php
/** @var \PandaGroup\SubunoApi\DataObject\Factory\Factory $factory*/
$orderInfo = $factory->create(\PandaGroup\SubunoApi\DataObject\OrderInformation::class, ['transactionId' => 123]);
```
And pass data objects to query builder:
```php
/** @var \PandaGroup\SubunoApi\Request\Builder\QueryBuilder $queryBuilder */
$queryBuilder->add($orderInfo)
$query = $queryBuilder->build()
```
Variable $query pass to execute method in client object.
```php
$response = $client->execute($query);
```
