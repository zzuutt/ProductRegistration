<?php

namespace ProductRegistration\Model\Map;

use ProductRegistration\Model\ProductRegistration;
use ProductRegistration\Model\ProductRegistrationQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'product_registration' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ProductRegistrationTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;
    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'ProductRegistration.Model.Map.ProductRegistrationTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'thelia';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'product_registration';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\ProductRegistration\\Model\\ProductRegistration';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'ProductRegistration.Model.ProductRegistration';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the ID field
     */
    const ID = 'product_registration.ID';

    /**
     * the column name for the TRANSCEIVER_ID field
     */
    const TRANSCEIVER_ID = 'product_registration.TRANSCEIVER_ID';

    /**
     * the column name for the SERIAL_NUMBER field
     */
    const SERIAL_NUMBER = 'product_registration.SERIAL_NUMBER';

    /**
     * the column name for the DATE_PURCHASE field
     */
    const DATE_PURCHASE = 'product_registration.DATE_PURCHASE';

    /**
     * the column name for the ANTENNA_ID field
     */
    const ANTENNA_ID = 'product_registration.ANTENNA_ID';

    /**
     * the column name for the OTHER_ANTENNA field
     */
    const OTHER_ANTENNA = 'product_registration.OTHER_ANTENNA';

    /**
     * the column name for the WHERE_PURCHASE field
     */
    const WHERE_PURCHASE = 'product_registration.WHERE_PURCHASE';

    /**
     * the column name for the CUSTOMER_ID field
     */
    const CUSTOMER_ID = 'product_registration.CUSTOMER_ID';

    /**
     * the column name for the WARRANTY field
     */
    const WARRANTY = 'product_registration.WARRANTY';

    /**
     * the column name for the CREATED_AT field
     */
    const CREATED_AT = 'product_registration.CREATED_AT';

    /**
     * the column name for the UPDATED_AT field
     */
    const UPDATED_AT = 'product_registration.UPDATED_AT';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'TransceiverId', 'SerialNumber', 'DatePurchase', 'AntennaId', 'OtherAntenna', 'WherePurchase', 'CustomerId', 'Warranty', 'CreatedAt', 'UpdatedAt', ),
        self::TYPE_STUDLYPHPNAME => array('id', 'transceiverId', 'serialNumber', 'datePurchase', 'antennaId', 'otherAntenna', 'wherePurchase', 'customerId', 'warranty', 'createdAt', 'updatedAt', ),
        self::TYPE_COLNAME       => array(ProductRegistrationTableMap::ID, ProductRegistrationTableMap::TRANSCEIVER_ID, ProductRegistrationTableMap::SERIAL_NUMBER, ProductRegistrationTableMap::DATE_PURCHASE, ProductRegistrationTableMap::ANTENNA_ID, ProductRegistrationTableMap::OTHER_ANTENNA, ProductRegistrationTableMap::WHERE_PURCHASE, ProductRegistrationTableMap::CUSTOMER_ID, ProductRegistrationTableMap::WARRANTY, ProductRegistrationTableMap::CREATED_AT, ProductRegistrationTableMap::UPDATED_AT, ),
        self::TYPE_RAW_COLNAME   => array('ID', 'TRANSCEIVER_ID', 'SERIAL_NUMBER', 'DATE_PURCHASE', 'ANTENNA_ID', 'OTHER_ANTENNA', 'WHERE_PURCHASE', 'CUSTOMER_ID', 'WARRANTY', 'CREATED_AT', 'UPDATED_AT', ),
        self::TYPE_FIELDNAME     => array('id', 'transceiver_id', 'serial_number', 'date_purchase', 'antenna_id', 'other_antenna', 'where_purchase', 'customer_id', 'warranty', 'created_at', 'updated_at', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'TransceiverId' => 1, 'SerialNumber' => 2, 'DatePurchase' => 3, 'AntennaId' => 4, 'OtherAntenna' => 5, 'WherePurchase' => 6, 'CustomerId' => 7, 'Warranty' => 8, 'CreatedAt' => 9, 'UpdatedAt' => 10, ),
        self::TYPE_STUDLYPHPNAME => array('id' => 0, 'transceiverId' => 1, 'serialNumber' => 2, 'datePurchase' => 3, 'antennaId' => 4, 'otherAntenna' => 5, 'wherePurchase' => 6, 'customerId' => 7, 'warranty' => 8, 'createdAt' => 9, 'updatedAt' => 10, ),
        self::TYPE_COLNAME       => array(ProductRegistrationTableMap::ID => 0, ProductRegistrationTableMap::TRANSCEIVER_ID => 1, ProductRegistrationTableMap::SERIAL_NUMBER => 2, ProductRegistrationTableMap::DATE_PURCHASE => 3, ProductRegistrationTableMap::ANTENNA_ID => 4, ProductRegistrationTableMap::OTHER_ANTENNA => 5, ProductRegistrationTableMap::WHERE_PURCHASE => 6, ProductRegistrationTableMap::CUSTOMER_ID => 7, ProductRegistrationTableMap::WARRANTY => 8, ProductRegistrationTableMap::CREATED_AT => 9, ProductRegistrationTableMap::UPDATED_AT => 10, ),
        self::TYPE_RAW_COLNAME   => array('ID' => 0, 'TRANSCEIVER_ID' => 1, 'SERIAL_NUMBER' => 2, 'DATE_PURCHASE' => 3, 'ANTENNA_ID' => 4, 'OTHER_ANTENNA' => 5, 'WHERE_PURCHASE' => 6, 'CUSTOMER_ID' => 7, 'WARRANTY' => 8, 'CREATED_AT' => 9, 'UPDATED_AT' => 10, ),
        self::TYPE_FIELDNAME     => array('id' => 0, 'transceiver_id' => 1, 'serial_number' => 2, 'date_purchase' => 3, 'antenna_id' => 4, 'other_antenna' => 5, 'where_purchase' => 6, 'customer_id' => 7, 'warranty' => 8, 'created_at' => 9, 'updated_at' => 10, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('product_registration');
        $this->setPhpName('ProductRegistration');
        $this->setClassName('\\ProductRegistration\\Model\\ProductRegistration');
        $this->setPackage('ProductRegistration.Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('TRANSCEIVER_ID', 'TransceiverId', 'INTEGER', true, null, null);
        $this->addColumn('SERIAL_NUMBER', 'SerialNumber', 'VARCHAR', true, 50, null);
        $this->addColumn('DATE_PURCHASE', 'DatePurchase', 'DATE', false, null, null);
        $this->addColumn('ANTENNA_ID', 'AntennaId', 'INTEGER', false, null, null);
        $this->addColumn('OTHER_ANTENNA', 'OtherAntenna', 'VARCHAR', false, 255, null);
        $this->addColumn('WHERE_PURCHASE', 'WherePurchase', 'VARCHAR', false, 255, null);
        $this->addColumn('CUSTOMER_ID', 'CustomerId', 'INTEGER', true, null, null);
        $this->addColumn('WARRANTY', 'Warranty', 'INTEGER', false, null, null);
        $this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
        );
    } // getBehaviors()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {

            return (int) $row[
                            $indexType == TableMap::TYPE_NUM
                            ? 0 + $offset
                            : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
                        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? ProductRegistrationTableMap::CLASS_DEFAULT : ProductRegistrationTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_STUDLYPHPNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     * @return array (ProductRegistration object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ProductRegistrationTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ProductRegistrationTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ProductRegistrationTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ProductRegistrationTableMap::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ProductRegistrationTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ProductRegistrationTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ProductRegistrationTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProductRegistrationTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ProductRegistrationTableMap::ID);
            $criteria->addSelectColumn(ProductRegistrationTableMap::TRANSCEIVER_ID);
            $criteria->addSelectColumn(ProductRegistrationTableMap::SERIAL_NUMBER);
            $criteria->addSelectColumn(ProductRegistrationTableMap::DATE_PURCHASE);
            $criteria->addSelectColumn(ProductRegistrationTableMap::ANTENNA_ID);
            $criteria->addSelectColumn(ProductRegistrationTableMap::OTHER_ANTENNA);
            $criteria->addSelectColumn(ProductRegistrationTableMap::WHERE_PURCHASE);
            $criteria->addSelectColumn(ProductRegistrationTableMap::CUSTOMER_ID);
            $criteria->addSelectColumn(ProductRegistrationTableMap::WARRANTY);
            $criteria->addSelectColumn(ProductRegistrationTableMap::CREATED_AT);
            $criteria->addSelectColumn(ProductRegistrationTableMap::UPDATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.TRANSCEIVER_ID');
            $criteria->addSelectColumn($alias . '.SERIAL_NUMBER');
            $criteria->addSelectColumn($alias . '.DATE_PURCHASE');
            $criteria->addSelectColumn($alias . '.ANTENNA_ID');
            $criteria->addSelectColumn($alias . '.OTHER_ANTENNA');
            $criteria->addSelectColumn($alias . '.WHERE_PURCHASE');
            $criteria->addSelectColumn($alias . '.CUSTOMER_ID');
            $criteria->addSelectColumn($alias . '.WARRANTY');
            $criteria->addSelectColumn($alias . '.CREATED_AT');
            $criteria->addSelectColumn($alias . '.UPDATED_AT');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(ProductRegistrationTableMap::DATABASE_NAME)->getTable(ProductRegistrationTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getServiceContainer()->getDatabaseMap(ProductRegistrationTableMap::DATABASE_NAME);
      if (!$dbMap->hasTable(ProductRegistrationTableMap::TABLE_NAME)) {
        $dbMap->addTableObject(new ProductRegistrationTableMap());
      }
    }

    /**
     * Performs a DELETE on the database, given a ProductRegistration or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ProductRegistration object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductRegistrationTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \ProductRegistration\Model\ProductRegistration) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProductRegistrationTableMap::DATABASE_NAME);
            $criteria->add(ProductRegistrationTableMap::ID, (array) $values, Criteria::IN);
        }

        $query = ProductRegistrationQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) { ProductRegistrationTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) { ProductRegistrationTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the product_registration table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ProductRegistrationQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ProductRegistration or Criteria object.
     *
     * @param mixed               $criteria Criteria or ProductRegistration object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductRegistrationTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ProductRegistration object
        }

        if ($criteria->containsKey(ProductRegistrationTableMap::ID) && $criteria->keyContainsValue(ProductRegistrationTableMap::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProductRegistrationTableMap::ID.')');
        }


        // Set the correct dbName
        $query = ProductRegistrationQuery::create()->mergeWith($criteria);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = $query->doInsert($con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

} // ProductRegistrationTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ProductRegistrationTableMap::buildTableMap();
