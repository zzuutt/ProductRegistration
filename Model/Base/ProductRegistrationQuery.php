<?php

namespace ProductRegistration\Model\Base;

use \Exception;
use \PDO;
use ProductRegistration\Model\ProductRegistration as ChildProductRegistration;
use ProductRegistration\Model\ProductRegistrationQuery as ChildProductRegistrationQuery;
use ProductRegistration\Model\Map\ProductRegistrationTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'product_registration' table.
 *
 *
 *
 * @method     ChildProductRegistrationQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildProductRegistrationQuery orderByTransceiverId($order = Criteria::ASC) Order by the transceiver_id column
 * @method     ChildProductRegistrationQuery orderBySerialNumber($order = Criteria::ASC) Order by the serial_number column
 * @method     ChildProductRegistrationQuery orderByDatePurchase($order = Criteria::ASC) Order by the date_purchase column
 * @method     ChildProductRegistrationQuery orderByAntennaId($order = Criteria::ASC) Order by the antenna_id column
 * @method     ChildProductRegistrationQuery orderByOtherAntenna($order = Criteria::ASC) Order by the other_antenna column
 * @method     ChildProductRegistrationQuery orderByWherePurchase($order = Criteria::ASC) Order by the where_purchase column
 * @method     ChildProductRegistrationQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     ChildProductRegistrationQuery orderByWarranty($order = Criteria::ASC) Order by the warranty column
 * @method     ChildProductRegistrationQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildProductRegistrationQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildProductRegistrationQuery groupById() Group by the id column
 * @method     ChildProductRegistrationQuery groupByTransceiverId() Group by the transceiver_id column
 * @method     ChildProductRegistrationQuery groupBySerialNumber() Group by the serial_number column
 * @method     ChildProductRegistrationQuery groupByDatePurchase() Group by the date_purchase column
 * @method     ChildProductRegistrationQuery groupByAntennaId() Group by the antenna_id column
 * @method     ChildProductRegistrationQuery groupByOtherAntenna() Group by the other_antenna column
 * @method     ChildProductRegistrationQuery groupByWherePurchase() Group by the where_purchase column
 * @method     ChildProductRegistrationQuery groupByCustomerId() Group by the customer_id column
 * @method     ChildProductRegistrationQuery groupByWarranty() Group by the warranty column
 * @method     ChildProductRegistrationQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildProductRegistrationQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildProductRegistrationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildProductRegistrationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildProductRegistrationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildProductRegistration findOne(ConnectionInterface $con = null) Return the first ChildProductRegistration matching the query
 * @method     ChildProductRegistration findOneOrCreate(ConnectionInterface $con = null) Return the first ChildProductRegistration matching the query, or a new ChildProductRegistration object populated from the query conditions when no match is found
 *
 * @method     ChildProductRegistration findOneById(int $id) Return the first ChildProductRegistration filtered by the id column
 * @method     ChildProductRegistration findOneByTransceiverId(int $transceiver_id) Return the first ChildProductRegistration filtered by the transceiver_id column
 * @method     ChildProductRegistration findOneBySerialNumber(string $serial_number) Return the first ChildProductRegistration filtered by the serial_number column
 * @method     ChildProductRegistration findOneByDatePurchase(string $date_purchase) Return the first ChildProductRegistration filtered by the date_purchase column
 * @method     ChildProductRegistration findOneByAntennaId(int $antenna_id) Return the first ChildProductRegistration filtered by the antenna_id column
 * @method     ChildProductRegistration findOneByOtherAntenna(string $other_antenna) Return the first ChildProductRegistration filtered by the other_antenna column
 * @method     ChildProductRegistration findOneByWherePurchase(string $where_purchase) Return the first ChildProductRegistration filtered by the where_purchase column
 * @method     ChildProductRegistration findOneByCustomerId(int $customer_id) Return the first ChildProductRegistration filtered by the customer_id column
 * @method     ChildProductRegistration findOneByWarranty(int $warranty) Return the first ChildProductRegistration filtered by the warranty column
 * @method     ChildProductRegistration findOneByCreatedAt(string $created_at) Return the first ChildProductRegistration filtered by the created_at column
 * @method     ChildProductRegistration findOneByUpdatedAt(string $updated_at) Return the first ChildProductRegistration filtered by the updated_at column
 *
 * @method     array findById(int $id) Return ChildProductRegistration objects filtered by the id column
 * @method     array findByTransceiverId(int $transceiver_id) Return ChildProductRegistration objects filtered by the transceiver_id column
 * @method     array findBySerialNumber(string $serial_number) Return ChildProductRegistration objects filtered by the serial_number column
 * @method     array findByDatePurchase(string $date_purchase) Return ChildProductRegistration objects filtered by the date_purchase column
 * @method     array findByAntennaId(int $antenna_id) Return ChildProductRegistration objects filtered by the antenna_id column
 * @method     array findByOtherAntenna(string $other_antenna) Return ChildProductRegistration objects filtered by the other_antenna column
 * @method     array findByWherePurchase(string $where_purchase) Return ChildProductRegistration objects filtered by the where_purchase column
 * @method     array findByCustomerId(int $customer_id) Return ChildProductRegistration objects filtered by the customer_id column
 * @method     array findByWarranty(int $warranty) Return ChildProductRegistration objects filtered by the warranty column
 * @method     array findByCreatedAt(string $created_at) Return ChildProductRegistration objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return ChildProductRegistration objects filtered by the updated_at column
 *
 */
abstract class ProductRegistrationQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \ProductRegistration\Model\Base\ProductRegistrationQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\ProductRegistration\\Model\\ProductRegistration', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildProductRegistrationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildProductRegistrationQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \ProductRegistration\Model\ProductRegistrationQuery) {
            return $criteria;
        }
        $query = new \ProductRegistration\Model\ProductRegistrationQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildProductRegistration|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProductRegistrationTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ProductRegistrationTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return   ChildProductRegistration A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, TRANSCEIVER_ID, SERIAL_NUMBER, DATE_PURCHASE, ANTENNA_ID, OTHER_ANTENNA, WHERE_PURCHASE, CUSTOMER_ID, WARRANTY, CREATED_AT, UPDATED_AT FROM product_registration WHERE ID = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            $obj = new ChildProductRegistration();
            $obj->hydrate($row);
            ProductRegistrationTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildProductRegistration|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProductRegistrationTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProductRegistrationTableMap::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ProductRegistrationTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ProductRegistrationTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductRegistrationTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the transceiver_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTransceiverId(1234); // WHERE transceiver_id = 1234
     * $query->filterByTransceiverId(array(12, 34)); // WHERE transceiver_id IN (12, 34)
     * $query->filterByTransceiverId(array('min' => 12)); // WHERE transceiver_id > 12
     * </code>
     *
     * @param     mixed $transceiverId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function filterByTransceiverId($transceiverId = null, $comparison = null)
    {
        if (is_array($transceiverId)) {
            $useMinMax = false;
            if (isset($transceiverId['min'])) {
                $this->addUsingAlias(ProductRegistrationTableMap::TRANSCEIVER_ID, $transceiverId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($transceiverId['max'])) {
                $this->addUsingAlias(ProductRegistrationTableMap::TRANSCEIVER_ID, $transceiverId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductRegistrationTableMap::TRANSCEIVER_ID, $transceiverId, $comparison);
    }

    /**
     * Filter the query on the serial_number column
     *
     * Example usage:
     * <code>
     * $query->filterBySerialNumber('fooValue');   // WHERE serial_number = 'fooValue'
     * $query->filterBySerialNumber('%fooValue%'); // WHERE serial_number LIKE '%fooValue%'
     * </code>
     *
     * @param     string $serialNumber The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function filterBySerialNumber($serialNumber = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($serialNumber)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $serialNumber)) {
                $serialNumber = str_replace('*', '%', $serialNumber);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductRegistrationTableMap::SERIAL_NUMBER, $serialNumber, $comparison);
    }

    /**
     * Filter the query on the date_purchase column
     *
     * Example usage:
     * <code>
     * $query->filterByDatePurchase('2011-03-14'); // WHERE date_purchase = '2011-03-14'
     * $query->filterByDatePurchase('now'); // WHERE date_purchase = '2011-03-14'
     * $query->filterByDatePurchase(array('max' => 'yesterday')); // WHERE date_purchase > '2011-03-13'
     * </code>
     *
     * @param     mixed $datePurchase The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function filterByDatePurchase($datePurchase = null, $comparison = null)
    {
        if (is_array($datePurchase)) {
            $useMinMax = false;
            if (isset($datePurchase['min'])) {
                $this->addUsingAlias(ProductRegistrationTableMap::DATE_PURCHASE, $datePurchase['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($datePurchase['max'])) {
                $this->addUsingAlias(ProductRegistrationTableMap::DATE_PURCHASE, $datePurchase['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductRegistrationTableMap::DATE_PURCHASE, $datePurchase, $comparison);
    }

    /**
     * Filter the query on the antenna_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAntennaId(1234); // WHERE antenna_id = 1234
     * $query->filterByAntennaId(array(12, 34)); // WHERE antenna_id IN (12, 34)
     * $query->filterByAntennaId(array('min' => 12)); // WHERE antenna_id > 12
     * </code>
     *
     * @param     mixed $antennaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function filterByAntennaId($antennaId = null, $comparison = null)
    {
        if (is_array($antennaId)) {
            $useMinMax = false;
            if (isset($antennaId['min'])) {
                $this->addUsingAlias(ProductRegistrationTableMap::ANTENNA_ID, $antennaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($antennaId['max'])) {
                $this->addUsingAlias(ProductRegistrationTableMap::ANTENNA_ID, $antennaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductRegistrationTableMap::ANTENNA_ID, $antennaId, $comparison);
    }

    /**
     * Filter the query on the other_antenna column
     *
     * Example usage:
     * <code>
     * $query->filterByOtherAntenna('fooValue');   // WHERE other_antenna = 'fooValue'
     * $query->filterByOtherAntenna('%fooValue%'); // WHERE other_antenna LIKE '%fooValue%'
     * </code>
     *
     * @param     string $otherAntenna The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function filterByOtherAntenna($otherAntenna = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($otherAntenna)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $otherAntenna)) {
                $otherAntenna = str_replace('*', '%', $otherAntenna);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductRegistrationTableMap::OTHER_ANTENNA, $otherAntenna, $comparison);
    }

    /**
     * Filter the query on the where_purchase column
     *
     * Example usage:
     * <code>
     * $query->filterByWherePurchase('fooValue');   // WHERE where_purchase = 'fooValue'
     * $query->filterByWherePurchase('%fooValue%'); // WHERE where_purchase LIKE '%fooValue%'
     * </code>
     *
     * @param     string $wherePurchase The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function filterByWherePurchase($wherePurchase = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($wherePurchase)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $wherePurchase)) {
                $wherePurchase = str_replace('*', '%', $wherePurchase);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProductRegistrationTableMap::WHERE_PURCHASE, $wherePurchase, $comparison);
    }

    /**
     * Filter the query on the customer_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCustomerId(1234); // WHERE customer_id = 1234
     * $query->filterByCustomerId(array(12, 34)); // WHERE customer_id IN (12, 34)
     * $query->filterByCustomerId(array('min' => 12)); // WHERE customer_id > 12
     * </code>
     *
     * @param     mixed $customerId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function filterByCustomerId($customerId = null, $comparison = null)
    {
        if (is_array($customerId)) {
            $useMinMax = false;
            if (isset($customerId['min'])) {
                $this->addUsingAlias(ProductRegistrationTableMap::CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($customerId['max'])) {
                $this->addUsingAlias(ProductRegistrationTableMap::CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductRegistrationTableMap::CUSTOMER_ID, $customerId, $comparison);
    }

    /**
     * Filter the query on the warranty column
     *
     * Example usage:
     * <code>
     * $query->filterByWarranty(1234); // WHERE warranty = 1234
     * $query->filterByWarranty(array(12, 34)); // WHERE warranty IN (12, 34)
     * $query->filterByWarranty(array('min' => 12)); // WHERE warranty > 12
     * </code>
     *
     * @param     mixed $warranty The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function filterByWarranty($warranty = null, $comparison = null)
    {
        if (is_array($warranty)) {
            $useMinMax = false;
            if (isset($warranty['min'])) {
                $this->addUsingAlias(ProductRegistrationTableMap::WARRANTY, $warranty['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($warranty['max'])) {
                $this->addUsingAlias(ProductRegistrationTableMap::WARRANTY, $warranty['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductRegistrationTableMap::WARRANTY, $warranty, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProductRegistrationTableMap::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProductRegistrationTableMap::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductRegistrationTableMap::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProductRegistrationTableMap::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProductRegistrationTableMap::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProductRegistrationTableMap::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildProductRegistration $productRegistration Object to remove from the list of results
     *
     * @return ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function prune($productRegistration = null)
    {
        if ($productRegistration) {
            $this->addUsingAlias(ProductRegistrationTableMap::ID, $productRegistration->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the product_registration table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductRegistrationTableMap::DATABASE_NAME);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProductRegistrationTableMap::clearInstancePool();
            ProductRegistrationTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildProductRegistration or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildProductRegistration object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public function delete(ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductRegistrationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ProductRegistrationTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        ProductRegistrationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ProductRegistrationTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProductRegistrationTableMap::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProductRegistrationTableMap::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProductRegistrationTableMap::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProductRegistrationTableMap::UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProductRegistrationTableMap::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ChildProductRegistrationQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProductRegistrationTableMap::CREATED_AT);
    }

} // ProductRegistrationQuery
