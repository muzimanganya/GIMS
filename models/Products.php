<?php

namespace app\models;

use app\traits\AuditTrailsTrait;
use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $NAME
 * @property string|null $description
 * @property float $purchase_price
 * @property float $sales_price
 * @property int $is_sold
 * @property int $is_purchase
 * @property int|null $reorder_level
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int|null $product_model
 * @property int|null $product_category
 * @property int|null $product_type
 * @property float $sales_tax
 * @property float $purchase_tax
 * @property string $sales_account
 * @property string $purchase_account
 * @property string $discount_account
 * @property string|null $measure
 * @property int|null $product_brand
 *
 * @property BillDetails[] $billDetails
 * @property Bills[] $billNos
 * @property Accounts $discountAccount
 * @property Measures $measure0
 * @property ProductBrands $productBrand
 * @property ProductCategories $productCategory
 * @property ProductModels $productModel
 * @property ProductTypes $productType
 * @property Accounts $purchaseAccount
 * @property PurchaseDetails[] $purchaseDetails
 * @property PurchaseOrders[] $purchaseNumbers
 * @property Taxes $purchaseTax
 * @property Accounts $salesAccount
 * @property Taxes $salesTax
 * @property StockAdjustments[] $stockAdjustments
 * @property StockMovemements[] $stockMovemements
 */
class Products extends \yii\db\ActiveRecord
{
    use AuditTrailsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME', 'purchase_price', 'sales_price','sales_tax', 'purchase_tax', 'sales_account', 'purchase_account', 'discount_account'], 'required'],
            [['purchase_price', 'sales_price', 'sales_tax', 'purchase_tax'], 'number'],
            [['is_sold', 'is_purchase', 'reorder_level', 'created_at', 'updated_at', 'created_by', 'updated_by', 'product_model', 'product_category', 'product_type', 'product_brand'], 'integer'],
            [['NAME'], 'string', 'max' => 55],
            [['description'], 'string', 'max' => 100],
            [['sales_account', 'purchase_account', 'discount_account'], 'string', 'max' => 50],
            [['measure'], 'string', 'max' => 15],
            [['NAME'], 'unique'],
            [['product_model'], 'exist', 'skipOnError' => true, 'targetClass' => ProductModels::class, 'targetAttribute' => ['product_model' => 'id']],
            [['product_brand'], 'exist', 'skipOnError' => true, 'targetClass' => ProductBrands::class, 'targetAttribute' => ['product_brand' => 'id']],
            [['product_category'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategories::class, 'targetAttribute' => ['product_category' => 'id']],
            [['product_type'], 'exist', 'skipOnError' => true, 'targetClass' => ProductTypes::class, 'targetAttribute' => ['product_type' => 'id']],
            [['sales_tax'], 'exist', 'skipOnError' => true, 'targetClass' => Taxes::class, 'targetAttribute' => ['sales_tax' => 'percent']],
            [['purchase_tax'], 'exist', 'skipOnError' => true, 'targetClass' => Taxes::class, 'targetAttribute' => ['purchase_tax' => 'percent']],
            [['sales_account'], 'exist', 'skipOnError' => true, 'targetClass' => Accounts::class, 'targetAttribute' => ['sales_account' => 'CODE']],
            [['purchase_account'], 'exist', 'skipOnError' => true, 'targetClass' => Accounts::class, 'targetAttribute' => ['purchase_account' => 'CODE']],
            [['discount_account'], 'exist', 'skipOnError' => true, 'targetClass' => Accounts::class, 'targetAttribute' => ['discount_account' => 'CODE']],
            [['measure'], 'exist', 'skipOnError' => true, 'targetClass' => Measures::class, 'targetAttribute' => ['measure' => 'CODE']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'NAME' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'purchase_price' => Yii::t('app', 'Purchase Price'),
            'sales_price' => Yii::t('app', 'Sales Price'),
            'is_sold' => Yii::t('app', 'Is Sold'),
            'is_purchase' => Yii::t('app', 'Is Purchase'),
            'reorder_level' => Yii::t('app', 'Reorder Level'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'product_model' => Yii::t('app', 'Product Model'),
            'product_category' => Yii::t('app', 'Product Category'),
            'product_type' => Yii::t('app', 'Product Type'),
            'sales_tax' => Yii::t('app', 'Sales Tax'),
            'purchase_tax' => Yii::t('app', 'Purchase Tax'),
            'sales_account' => Yii::t('app', 'Sales Account'),
            'purchase_account' => Yii::t('app', 'Purchase Account'),
            'discount_account' => Yii::t('app', 'Discount Account'),
            'measure' => Yii::t('app', 'Measure'),
            'product_brand' => Yii::t('app', 'Product Brand'),
        ];
    }

    /**
     * Gets query for [[BillDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBillDetails()
    {
        return $this->hasMany(BillDetails::class, ['product' => 'id']);
    }

    /**
     * Gets query for [[BillNos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBillNos()
    {
        return $this->hasMany(Bills::class, ['bill_no' => 'bill_no'])->viaTable('bill_details', ['product' => 'id']);
    }

    /**
     * Gets query for [[DiscountAccount]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiscountAccount()
    {
        return $this->hasOne(Accounts::class, ['CODE' => 'discount_account']);
    }

    /**
     * Gets query for [[Measure0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeasure0()
    {
        return $this->hasOne(Measures::class, ['CODE' => 'measure']);
    }

    /**
     * Gets query for [[ProductBrand]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductBrand()
    {
        return $this->hasOne(ProductBrands::class, ['id' => 'product_brand']);
    }

    /**
     * Gets query for [[ProductCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategories::class, ['id' => 'product_category']);
    }

    /**
     * Gets query for [[ProductModel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductModel()
    {
        return $this->hasOne(ProductModels::class, ['id' => 'product_model']);
    }

    /**
     * Gets query for [[ProductType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductType()
    {
        return $this->hasOne(ProductTypes::class, ['id' => 'product_type']);
    }

    /**
     * Gets query for [[PurchaseAccount]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseAccount()
    {
        return $this->hasOne(Accounts::class, ['CODE' => 'purchase_account']);
    }

    /**
     * Gets query for [[PurchaseDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseDetails()
    {
        return $this->hasMany(PurchaseDetails::class, ['product' => 'id']);
    }

    /**
     * Gets query for [[PurchaseNumbers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseNumbers()
    {
        return $this->hasMany(PurchaseOrders::class, ['purchase_number' => 'purchase_number'])->viaTable('purchase_details', ['product' => 'id']);
    }

    /**
     * Gets query for [[PurchaseTax]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchaseTax()
    {
        return $this->hasOne(Taxes::class, ['percent' => 'purchase_tax']);
    }

    /**
     * Gets query for [[SalesAccount]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSalesAccount()
    {
        return $this->hasOne(Accounts::class, ['CODE' => 'sales_account']);
    }

    /**
     * Gets query for [[SalesTax]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSalesTax()
    {
        return $this->hasOne(Taxes::class, ['percent' => 'sales_tax']);
    }

    /**
     * Gets query for [[StockAdjustments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStockAdjustments()
    {
        return $this->hasMany(StockAdjustments::class, ['product' => 'id']);
    }

    /**
     * Gets query for [[StockMovemements]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStockMovemements()
    {
        return $this->hasMany(StockMovemements::class, ['product' => 'id']);
    }
}
