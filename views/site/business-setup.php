<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use kartik\date\DatePicker;
use miloschuman\highcharts\Highcharts;

$this->title = 'Business Setup';
$this->params['breadcrumbs'][] = $this->title;
?>


<!-- page content -->
 
                <div class="clearfix"></div>
                               
                
                <div>
                    <div class="lds-facebook" id="progress" style="display: none; left:45%;">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                    

<ul id="w10" class="nav nav-tabs"><li class="active"><a href="#w10-tab0" data-toggle="tab">General Setup</a></li>
<li><a href="#w10-tab1" data-toggle="tab">Products &amp; Stores</a></li>
<!-- <li><a href="#w10-tab5" data-toggle="tab">Accounting</a></li>
<li><a href="#w10-tab2" data-toggle="tab">Hotel Booking</a></li>
<li><a href="#w10-tab3" data-toggle="tab">Restaurant</a></li> -->
<li><a href="#w10-tab4" data-toggle="tab">Business Settings</a></li></ul>
<div class="tab-content"><div id="w10-tab0" class="tab-pane active"><br>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><a href="/index.php/accounting/customers/index">Manage Customers</a></h3>
                                Add New Customers, update customer details and delete customers with no records            </div>
        </div>
    </div>
    <div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-body">
            <h3><?= Html::a('Manage Vendors', ['/suppliers/index']) ?></h3>
            Add New Vendors, update vendor details and delete vendors with no records
        </div>
    </div>
</div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><a href="/index.php/accounting/business-locations/index">Business Locations</a></h3>
                                Manage Business Locations and modularize your business to streamline operations            </div>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                                            <h3><a href="/index.php/accounting/invitations/members">Business Members</a></h3>
                                        Manage Business Members, people with access to the business. Here you can view or remove any invited person                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                                            <h3><a href="/index.php/accounting/invitations/invite-user">Invite Users to Business</a></h3>
                                        Add Mores users to your business with defined access levels. Limit depends on your Plan                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
             <h3><a href="/index.php/accounting/invitations/access-control">Members Access Level</a></h3>
                Manage members Access Level to the System. Promote or Demote a member to a given access level!                </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><a href="/index.php/accounting/exchange-rates/index">Custom Exchange Rates</a></h3>
                                Manage Business Exchange rate to override any system-wide exchange mechanism            </div>
        </div>
    </div>

    <div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-body">
            <h3><?= Html::a('Manage Taxes', ['/taxes/index']) ?></h3>
            Manage all types available in the country
        </div>
    </div>
    </div>

    <div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-body">
            <h3><?= Html::a('Manage Currencies', ['/currencies/index']) ?></h3>
            Add New Currencies, update currency details and delete currencies with no records
        </div>
    </div>
    </div>
</div></div>
<div id="w10-tab1" class="tab-pane">
<br>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><?= Html::a('Products & Services', ['/products/index']) ?></h3>
                                Add, Import, Edit and Categorize your Products<br><br>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><?= Html::a('Product Categories', ['/product-categories/index']) ?></h3>
                                Add, Edit and Delete Categories for your Products            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><?= Html::a('Product Brands', ['/product-brands/index']) ?></h3>
                                Organize Brands for your Products Vendors            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><?= Html::a('Measuring Units', ['/measures/index']) ?></h3>
                                Measuring units by which product is measured, like KG, Bottles, Litres, mm, cm et al            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><?= Html::a('Manage Stores', ['/stores/index']) ?></h3>
                                Setup Your stores to be able to track your store stock<br><br>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><?= Html::a('Product Types', ['/product-types/index']) ?></h3>
                                Manage all product types<br><br>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><?= Html::a('Product Models', ['/product-models/index']) ?></h3>
                                Manage product models </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><a href="/index.php/inventory/products/setup-accounts">Setup Product Accounts</a></h3>
                                Massive assignment of your products accounts. Setup Purchase, Sales, Discount for multiple products!            </div>
        </div>
    </div>

    <div class="col-md-4">

    </div>
</div></div>
<div id="w10-tab2" class="tab-pane">
<br>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><a href="/index.php/hotel/rooms/index">Hotel Rooms</a></h3>
                                Setup hotel rooms, and pricing<br>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><a href="/index.php/hotel/prices/index">Room and Services Prices</a></h3>
                                Setup hotel prices, and services pricing<br>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><a href="/index.php/hotel/foods-drinks/index">Menu List</a></h3>
                                Setup different food cooked or sold at this restaurant<br>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><a href="/index.php/hotel/recipes-manager/index">Recipe Management</a></h3>
                                Manage foods ratios of its ingredients<br>
            </div>
        </div>
    </div>

    <div class="col-md-4"></div>
    <div class="col-md-4"></div>
</div></div>

<div id="w10-tab5" class="tab-pane">
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3><?= Html::a('Chart of Accounts', ['/accounts/index']) ?></h3>
                    Setup financial chart of accounts<br>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3><?= Html::a('Account categories', ['/account-categories/index']) ?></h3>
                    Setup account categories<br>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3><?= Html::a('Account types', ['/account-types/index']) ?></h3>
                    Setup different types of accounts<br>
                </div>
            </div>
        </div>
    </div>

    
</div>


<div id="w10-tab3" class="tab-pane">
<br>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><a href="/index.php/resto/foods-drinks/index">Menu List</a></h3>
                                Setup different food cooked or sold at this restaurant<br>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><a href="/index.php/resto/tables/index">Manage Tables</a></h3>
                                Setup restaurant tables<br>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><a href="/index.php/kitchen/recipes-manager/index">Recipe Management</a></h3>
                                Manage foods ratios of its ingredients<br>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><a href="/index.php/resto/prices/index">Location Prices</a></h3>
                                Setup prices for food sold at this restaurant<br>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-body">
                                    <h3><a href="/index.php/resto/default/import-waiters">Import Waiters</a></h3>
                                Bulk Import waiters to user in the system<br>
            </div>
        </div>
    </div>

    <div class="col-md-4">
    </div>
</div></div>
<div id="w10-tab4" class="tab-pane"><br>
<form id="w0" class="form-vertical kv-form-bs3" action="/index.php/menu/business-setup" method="post" autocomplete="off">
<input type="hidden" name="_csrf" value="Cj6NDqBoS6Xc_a1w_Vo-ezuhew-rwqicjVAYPAkwMSVjV_xH2lg71Y663B2WbGsJbJMONpzx-KT7My9QRUNQSg==">
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

<div class="row"><div class="col-md-9">
<div class="tab-content"><div id="w9-tab0" class="tab-pane active"><div id="w1" class="TOP_CLASS_HERE"><div class='row'>
<div class="ITEM_CLASS_HERE" data-key="ACTION_DISABLE_CANCELLATION">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Disable Cancellation</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-action_disable_cancellation-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[ACTION_DISABLE_CANCELLATION][value]" value="0"><input type="checkbox" id="businesssetting-action_disable_cancellation-value" class="form-control" name="BusinessSetting[ACTION_DISABLE_CANCELLATION][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Prevent any cancellation of Invoices, Bills, and all other documents that can be cancelled. The Cancel button will not show-up under these documents        </div>
    </div>
</div></div>

<div class="ITEM_CLASS_HERE" data-key="DEFAULT_TAX_IS_EXCLUSIVE">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Default: Tax Exclusive</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-default_tax_is_exclusive-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[DEFAULT_TAX_IS_EXCLUSIVE][value]" value="0"><input type="checkbox" id="businesssetting-default_tax_is_exclusive-value" class="form-control" name="BusinessSetting[DEFAULT_TAX_IS_EXCLUSIVE][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            When your Invoices, Sales and Purchases are mostly tax exclusive set this enabled. Else set it disabled        </div>
    </div>
</div></div>
</div>
<div class='row'>
<div class="ITEM_CLASS_HERE" data-key="LIMIT_STANDARD_USER">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Limit Standard Dashboard</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-limit_standard_user-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[LIMIT_STANDARD_USER][value]" value="0"><input type="checkbox" id="businesssetting-limit_standard_user-value" class="form-control" name="BusinessSetting[LIMIT_STANDARD_USER][value]" value="1" checked aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Limit What Standard user can see in his dashboard. The limits include seeing only today sales and nothing more, when this option is enabled        </div>
    </div>
</div></div>

<div class="ITEM_CLASS_HERE" data-key="LIMIT_START_DATE_TO_TODAY">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Restrict Previous Days</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-limit_start_date_to_today-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[LIMIT_START_DATE_TO_TODAY][value]" value="0"><input type="checkbox" id="businesssetting-limit_start_date_to_today-value" class="form-control" name="BusinessSetting[LIMIT_START_DATE_TO_TODAY][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Do not allow transactions like creating Invoices, Sales, Bills to show previous dates beyond today. Note that this does not apply to report filters        </div>
    </div>
</div></div>
</div>
<div class='row'>
<div class="ITEM_CLASS_HERE" data-key="MOBILE_MAX_PREVIOUS_RECORD_MONTHS">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Mobile Max Visible Record</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-mobile_max_previous_record_months-value required">


<input type="text" id="businesssetting-mobile_max_previous_record_months-value" class="form-control" name="BusinessSetting[MOBILE_MAX_PREVIOUS_RECORD_MONTHS][value]" value="12" aria-required="true">

<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Number of total previous months that you want record to show up in your mobile phone        </div>
    </div>
</div></div>

<div class="ITEM_CLASS_HERE" data-key="MULTICURRENCY_ENABLED">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Enable Multi-currency</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-multicurrency_enabled-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[MULTICURRENCY_ENABLED][value]" value="0"><input type="checkbox" id="businesssetting-multicurrency_enabled-value" class="form-control" name="BusinessSetting[MULTICURRENCY_ENABLED][value]" value="1" checked aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Check this option to be able to use multi-currency in your Invoices, Purchases, et al        </div>
    </div>
</div></div>
</div>
<div class='row'>
<div class="ITEM_CLASS_HERE" data-key="PROJECT_ENABLED">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Enable Project Management</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-project_enabled-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[PROJECT_ENABLED][value]" value="0"><input type="checkbox" id="businesssetting-project_enabled-value" class="form-control" name="BusinessSetting[PROJECT_ENABLED][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Check this option to be able to associate Sales and Expenses with specific project and track profitability        </div>
    </div>
</div></div>

<div class="ITEM_CLASS_HERE" data-key="RECEIPT_PRINTER_PSIZE">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Receipt Paper Size</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-receipt_printer_psize-value required">


<input type="text" id="businesssetting-receipt_printer_psize-value" class="form-control" name="BusinessSetting[RECEIPT_PRINTER_PSIZE][value]" value="80" aria-required="true">

<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Set the Thermal Printer receipt paper size. If your printer is 58mm then set 58 and 80 if it is 80mm         </div>
    </div>
</div></div>
</div>
<div class='row'>
<div class="ITEM_CLASS_HERE" data-key="SHOW_ADVANCE_PAYMENT_LIABILITY_ACC">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Set Advance Liability</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-show_advance_payment_liability_acc-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[SHOW_ADVANCE_PAYMENT_LIABILITY_ACC][value]" value="0"><input type="checkbox" id="businesssetting-show_advance_payment_liability_acc-value" class="form-control" name="BusinessSetting[SHOW_ADVANCE_PAYMENT_LIABILITY_ACC][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Checking this option allows you to select liability account of unearned revenue from advance payments        </div>
    </div>
</div></div>
</div></div></div>
<div id="w9-tab1" class="tab-pane"><div id="w2" class="TOP_CLASS_HERE"><div class='row'>
<div class="ITEM_CLASS_HERE" data-key="INVOICE_SALE_CANCEL_TO_BACK_DATE">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Set Cancel to Sale date</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-invoice_sale_cancel_to_back_date-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[INVOICE_SALE_CANCEL_TO_BACK_DATE][value]" value="0"><input type="checkbox" id="businesssetting-invoice_sale_cancel_to_back_date-value" class="form-control" name="BusinessSetting[INVOICE_SALE_CANCEL_TO_BACK_DATE][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Select to make sure that each time you cancel Invoice or sale, it will back-date transaction to day Invoice was cancelled.        </div>
    </div>
</div></div>

<div class="ITEM_CLASS_HERE" data-key="SHOW_SALES_ACCOUNT">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Show Sales/Expense Account</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-show_sales_account-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[SHOW_SALES_ACCOUNT][value]" value="0"><input type="checkbox" id="businesssetting-show_sales_account-value" class="form-control" name="BusinessSetting[SHOW_SALES_ACCOUNT][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Checking this option shows the Sales Account and the cashier can change it. Uncheck it to hide POS sales account in sales and invoices        </div>
    </div>
</div></div>
</div>
<div class='row'>
<div class="ITEM_CLASS_HERE" data-key="SHOW_SALES_DISCOUNT">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Show Sales Discount</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-show_sales_discount-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[SHOW_SALES_DISCOUNT][value]" value="0"><input type="checkbox" id="businesssetting-show_sales_discount-value" class="form-control" name="BusinessSetting[SHOW_SALES_DISCOUNT][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Checking this option shows the Discount and the cashier can discount prices. Uncheck it if you will not be giving discounts        </div>
    </div>
</div></div>

<div class="ITEM_CLASS_HERE" data-key="SHOW_TAX">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Show Sales Taxes</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-show_tax-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[SHOW_TAX][value]" value="0"><input type="checkbox" id="businesssetting-show_tax-value" class="form-control" name="BusinessSetting[SHOW_TAX][value]" value="1" checked aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Checking this option shows the taxes and the cashier can change it on sale. Uncheck it to hide sales tax in POS sales and invoices        </div>
    </div>
</div></div>
</div></div></div>
<div id="w9-tab2" class="tab-pane"><div id="w3" class="TOP_CLASS_HERE"><div class='row'>
<div class="ITEM_CLASS_HERE" data-key="ALLOW_INVOICE_EDIT">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Edit Sale Price</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-allow_invoice_edit-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[ALLOW_INVOICE_EDIT][value]" value="0"><input type="checkbox" id="businesssetting-allow_invoice_edit-value" class="form-control" name="BusinessSetting[ALLOW_INVOICE_EDIT][value]" value="1" checked aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Allow when changing Pricing and Taxes to a custom one than one already set in the system during Invoice creating.        </div>
    </div>
</div></div>

<div class="ITEM_CLASS_HERE" data-key="INVOICE_ADD_BIZ_TO_INVOICE">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Generate Combined Invoice Number</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-invoice_add_biz_to_invoice-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[INVOICE_ADD_BIZ_TO_INVOICE][value]" value="0"><input type="checkbox" id="businesssetting-invoice_add_biz_to_invoice-value" class="form-control" name="BusinessSetting[INVOICE_ADD_BIZ_TO_INVOICE][value]" value="1" checked aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Include Business details when creating Invoice number. Use this if you have multiple Branches and uses the same TIN!        </div>
    </div>
</div></div>
</div>
<div class='row'>
<div class="ITEM_CLASS_HERE" data-key="INVOICE_DEDUCT_INVENTORY">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Sales Changes Stock Balance</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-invoice_deduct_inventory-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[INVOICE_DEDUCT_INVENTORY][value]" value="0"><input type="checkbox" id="businesssetting-invoice_deduct_inventory-value" class="form-control" name="BusinessSetting[INVOICE_DEDUCT_INVENTORY][value]" value="1" checked aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Should Invoice Sale deduct the items sold from your stock Balance? If not checked any Invoice approved will not change stock balance!        </div>
    </div>
</div></div>

<div class="ITEM_CLASS_HERE" data-key="INVOICE_ENABLE_DELIVERY_NOTES">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Enable Delivery Notes</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-invoice_enable_delivery_notes-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[INVOICE_ENABLE_DELIVERY_NOTES][value]" value="0"><input type="checkbox" id="businesssetting-invoice_enable_delivery_notes-value" class="form-control" name="BusinessSetting[INVOICE_ENABLE_DELIVERY_NOTES][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Switch on this settings to enable invoices to generate delivery notes with each invoice approval        </div>
    </div>
</div></div>
</div>
<div class='row'>
<div class="ITEM_CLASS_HERE" data-key="INVOICE_ENABLE_TERMS_CONDITIONS">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Proforma Terms and Condition</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-invoice_enable_terms_conditions-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[INVOICE_ENABLE_TERMS_CONDITIONS][value]" value="0"><input type="checkbox" id="businesssetting-invoice_enable_terms_conditions-value" class="form-control" name="BusinessSetting[INVOICE_ENABLE_TERMS_CONDITIONS][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Switch on this settings to enable proforma invoices to display terms and conditions        </div>
    </div>
</div></div>

<div class="ITEM_CLASS_HERE" data-key="INVOICE_ENABLE_TERMS_NOTES">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Show Invoice Notes</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-invoice_enable_terms_notes-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[INVOICE_ENABLE_TERMS_NOTES][value]" value="0"><input type="checkbox" id="businesssetting-invoice_enable_terms_notes-value" class="form-control" name="BusinessSetting[INVOICE_ENABLE_TERMS_NOTES][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Switch on this settings to show Invoice notes. Turn it off if your Invoices have no notes        </div>
    </div>
</div></div>
</div>
<div class='row'>
<div class="ITEM_CLASS_HERE" data-key="INVOICE_KEEP_PROFORMA">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Keep Proforma?</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-invoice_keep_proforma-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[INVOICE_KEEP_PROFORMA][value]" value="0"><input type="checkbox" id="businesssetting-invoice_keep_proforma-value" class="form-control" name="BusinessSetting[INVOICE_KEEP_PROFORMA][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Switch on this settings to keep the Proforma after approving it to Tax Invoice.        </div>
    </div>
</div></div>

<div class="ITEM_CLASS_HERE" data-key="INVOICE_PROFORMA_EDIT_ON_APPROVAL">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Edit Proforma on Approval</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-invoice_proforma_edit_on_approval-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[INVOICE_PROFORMA_EDIT_ON_APPROVAL][value]" value="0"><input type="checkbox" id="businesssetting-invoice_proforma_edit_on_approval-value" class="form-control" name="BusinessSetting[INVOICE_PROFORMA_EDIT_ON_APPROVAL][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Allow changing basic details of the invoice mostly dates when approving proforma into Tax Invoice        </div>
    </div>
</div></div>
</div>
<div class='row'>
<div class="ITEM_CLASS_HERE" data-key="INVOICE_SHOW_INVOICE_AFFECTS_STOCK">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Show Invoice Stock Changing</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-invoice_show_invoice_affects_stock-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[INVOICE_SHOW_INVOICE_AFFECTS_STOCK][value]" value="0"><input type="checkbox" id="businesssetting-invoice_show_invoice_affects_stock-value" class="form-control" name="BusinessSetting[INVOICE_SHOW_INVOICE_AFFECTS_STOCK][value]" value="1" checked aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Switch on this settings to be able to choose if individual Invoice affects stock balance        </div>
    </div>
</div></div>

<div class="ITEM_CLASS_HERE" data-key="INVOICE_SHOW_INVOICE_STORE">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Show Invoice Store</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-invoice_show_invoice_store-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[INVOICE_SHOW_INVOICE_STORE][value]" value="0"><input type="checkbox" id="businesssetting-invoice_show_invoice_store-value" class="form-control" name="BusinessSetting[INVOICE_SHOW_INVOICE_STORE][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Switch on this settings to be able to choose store to create Invoice for        </div>
    </div>
</div></div>
</div></div></div>
<div id="w9-tab3" class="tab-pane"><div id="w4" class="TOP_CLASS_HERE"><div class='row'>
<div class="ITEM_CLASS_HERE" data-key="ALLOW_INVENTORY_EDIT">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Edit Sale Price</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-allow_inventory_edit-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[ALLOW_INVENTORY_EDIT][value]" value="0"><input type="checkbox" id="businesssetting-allow_inventory_edit-value" class="form-control" name="BusinessSetting[ALLOW_INVENTORY_EDIT][value]" value="1" checked aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Allow when changing Pricing and Taxes to a custom one than one already set in the system during Inventory Sales.        </div>
    </div>
</div></div>

<div class="ITEM_CLASS_HERE" data-key="INVENTORY_FORCE_STORE">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Force Use of Store</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-inventory_force_store-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[INVENTORY_FORCE_STORE][value]" value="0"><input type="checkbox" id="businesssetting-inventory_force_store-value" class="form-control" name="BusinessSetting[INVENTORY_FORCE_STORE][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Force use to use Store whenever stock is involved, be it in Purchase Order, Stock Balance or Sales.        </div>
    </div>
</div></div>
</div>
<div class='row'>
<div class="ITEM_CLASS_HERE" data-key="POS_SHOW_POINT_OF_SALE">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Show Point of Sale</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-pos_show_point_of_sale-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[POS_SHOW_POINT_OF_SALE][value]" value="0"><input type="checkbox" id="businesssetting-pos_show_point_of_sale-value" class="form-control" name="BusinessSetting[POS_SHOW_POINT_OF_SALE][value]" value="1" checked aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Enable this setting if you want to show Point of Sale menu        </div>
    </div>
</div></div>
</div></div></div>
<div id="w9-tab4" class="tab-pane"><div id="w5" class="TOP_CLASS_HERE"><div class='row'>
<div class="ITEM_CLASS_HERE" data-key="ALLOW_BILL_EDIT">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Edit Purchase Price</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-allow_bill_edit-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[ALLOW_BILL_EDIT][value]" value="0"><input type="checkbox" id="businesssetting-allow_bill_edit-value" class="form-control" name="BusinessSetting[ALLOW_BILL_EDIT][value]" value="1" checked aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Allow when changing Pricing and Taxes to a custom one than one already set in the system during Bill creation.        </div>
    </div>
</div></div>

<div class="ITEM_CLASS_HERE" data-key="SHOW_BILL_TAX">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Show Taxes on Bills</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-show_bill_tax-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[SHOW_BILL_TAX][value]" value="0"><input type="checkbox" id="businesssetting-show_bill_tax-value" class="form-control" name="BusinessSetting[SHOW_BILL_TAX][value]" value="1" checked aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Checking this option shows the taxes and the bill author can change it. Uncheck it to hide sales tax in expense bills        </div>
    </div>
</div></div>
</div></div></div>
<div id="w9-tab5" class="tab-pane"><div id="w6" class="TOP_CLASS_HERE"><div class='row'>
<div class="ITEM_CLASS_HERE" data-key="PURCHASE_ORDERS_ENFORCE_INVOICE_NUMBER">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Enforce Invoice Number</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-purchase_orders_enforce_invoice_number-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[PURCHASE_ORDERS_ENFORCE_INVOICE_NUMBER][value]" value="0"><input type="checkbox" id="businesssetting-purchase_orders_enforce_invoice_number-value" class="form-control" name="BusinessSetting[PURCHASE_ORDERS_ENFORCE_INVOICE_NUMBER][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Enforce adding Invoice number to Puchase Orders        </div>
    </div>
</div></div>

<div class="ITEM_CLASS_HERE" data-key="PURCHASE_ORDERS_SHOW_EXPECTED_DATE">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Show Expected date</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-purchase_orders_show_expected_date-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[PURCHASE_ORDERS_SHOW_EXPECTED_DATE][value]" value="0"><input type="checkbox" id="businesssetting-purchase_orders_show_expected_date-value" class="form-control" name="BusinessSetting[PURCHASE_ORDERS_SHOW_EXPECTED_DATE][value]" value="1" checked aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Show Purchase order receive expected date, in reports and form        </div>
    </div>
</div></div>
</div>
<div class='row'>
<div class="ITEM_CLASS_HERE" data-key="PURCHASE_ORDERS_SHOW_NOTES">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Show Notes</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-purchase_orders_show_notes-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[PURCHASE_ORDERS_SHOW_NOTES][value]" value="0"><input type="checkbox" id="businesssetting-purchase_orders_show_notes-value" class="form-control" name="BusinessSetting[PURCHASE_ORDERS_SHOW_NOTES][value]" value="1" checked aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Show Purchase Order notes        </div>
    </div>
</div></div>
</div></div></div>
<div id="w9-tab6" class="tab-pane"><div id="w7" class="TOP_CLASS_HERE"><div class='row'>
<div class="ITEM_CLASS_HERE" data-key="ALLOW_ADVANCE_AUTOPAY">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Auto-Pay Invoice</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-allow_advance_autopay-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[ALLOW_ADVANCE_AUTOPAY][value]" value="0"><input type="checkbox" id="businesssetting-allow_advance_autopay-value" class="form-control" name="BusinessSetting[ALLOW_ADVANCE_AUTOPAY][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Checking this option allows you pay Invoices on approval if there is Advance Payment        </div>
    </div>
</div></div>
</div></div></div>
<div id="w9-tab7" class="tab-pane"><div id="w8" class="TOP_CLASS_HERE"><div class='row'>
<div class="ITEM_CLASS_HERE" data-key="RESTO_HOTEL_AUTOMANAGE_STORE_STOCK_CHANGE">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Auto-Manage Kitchen Stock</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-resto_hotel_automanage_store_stock_change-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[RESTO_HOTEL_AUTOMANAGE_STORE_STOCK_CHANGE][value]" value="0"><input type="checkbox" id="businesssetting-resto_hotel_automanage_store_stock_change-value" class="form-control" name="BusinessSetting[RESTO_HOTEL_AUTOMANAGE_STORE_STOCK_CHANGE][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Auto-change Stock balance in the kitchen based on recipes. This requires reciped be existing and Kitchen store enabled        </div>
    </div>
</div></div>

<div class="ITEM_CLASS_HERE" data-key="RESTO_HOTEL_AUTO_BOOKING_PRICE">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Auto-Manage Booking Price</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-resto_hotel_auto_booking_price-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[RESTO_HOTEL_AUTO_BOOKING_PRICE][value]" value="0"><input type="checkbox" id="businesssetting-resto_hotel_auto_booking_price-value" class="form-control" name="BusinessSetting[RESTO_HOTEL_AUTO_BOOKING_PRICE][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Let the hotel auto manage Booking price and exchange rates. Disable to manually feed both        </div>
    </div>
</div></div>
</div>
<div class='row'>
<div class="ITEM_CLASS_HERE" data-key="RESTO_HOTEL_USE_KITCHEN_STORE">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Enable Kitchen as Store</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-resto_hotel_use_kitchen_store-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[RESTO_HOTEL_USE_KITCHEN_STORE][value]" value="0"><input type="checkbox" id="businesssetting-resto_hotel_use_kitchen_store-value" class="form-control" name="BusinessSetting[RESTO_HOTEL_USE_KITCHEN_STORE][value]" value="1" checked aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Allow Chef to request stock and deduct from kitchen than main store        </div>
    </div>
</div></div>

<div class="ITEM_CLASS_HERE" data-key="RESTO_ORDER_ALLOW_ACCOMANYING_FOOD">
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Resto Orders Accompaniments</div>
            <div class="clearfix"></div><br>

            <div class="pull-right">
                                    <div class="form-group highlight-addon field-businesssetting-resto_order_allow_accomanying_food-value required">


<div class="form-group"><input type="hidden" name="BusinessSetting[RESTO_ORDER_ALLOW_ACCOMANYING_FOOD][value]" value="0"><input type="checkbox" id="businesssetting-resto_order_allow_accomanying_food-value" class="form-control" name="BusinessSetting[RESTO_ORDER_ALLOW_ACCOMANYING_FOOD][value]" value="1" aria-required="true" data-krajee-bootstrapSwitch="bootstrapSwitch_53c3518a"></div>


<div class="help-block help-block-error"></div>

</div>                            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            Turn this option to enable record order item as accompanying, with zero price        </div>
    </div>
</div></div>
</div></div></div></div></div><div class="col-md-3"><ul id="w9" class="nav nav nav-pills nav-stacked"><li class="active"><a href="#w9-tab0" data-toggle="tab">General</a></li>
<li><a href="#w9-tab1" data-toggle="tab">All Sales</a></li>
<li><a href="#w9-tab2" data-toggle="tab">Invoice Sales</a></li>
<li><a href="#w9-tab3" data-toggle="tab">Point of Sale</a></li>
<li><a href="#w9-tab4" data-toggle="tab">Expenses</a></li>
<li><a href="#w9-tab5" data-toggle="tab">Purchase Orders</a></li>
<li><a href="#w9-tab6" data-toggle="tab">School Management</a></li>
<li><a href="#w9-tab7" data-toggle="tab">Resto, Camps &amp; Hotels</a></li></ul></div></div><br>
<br>
<div class="form-group">
    <button type="submit" class="btn btn-success btn-block">Save Settings</button></div>
</form></div></div><br>
                </div>
            </div>