# Product Registration

This module generate the warranty registration form

it's specific for my site, it use parameters other modules

## Installation

### Manually

* Copy the module into ```<thelia_root>/local/modules/``` directory and be sure that the name of the module is ProductRegistration.
* Activate it in your thelia administration panel

### Composer

Add it in your main thelia composer.json file

```
composer require your-vendor/product-registration-module:~1.0
```

## Usage

This module is visible in 
 - the BackOffice Customer Edit.
 - the FrontOffice Register.

## Hook

this module use personnal hook :
>   warranty-registration.form-bottom
>   warranty-registration.stylesheet
W   warranty-registration.javascript-initialization


## Loop

```smarty
{loop name="registration" type="product-registration" customer_id="id"}
    ...
{/loop}
```

### Input arguments

|Argument |Description |
|---      |--- |
|**customer_id** | A single or a list of ids. |

### Output arguments

|Variable   |Description |
|---        |--- |
|$ID    | The feature type id |
|$TRANSCEIVER_ID    | The feature type transceiver_id |
|$ANTENNA_ID    | The feature type antenna_id |
|$OTHER_ANTENNA   | The feature type other_antenna |
|$SERIAL_NUMBER    | The feature type serial_number |
|$DATE_PURCHASE    | The feature type date_purchase |
|$WHERE_PURCHASE    | The feature type where_purchase |
|$WARRANTY    | number of the years |
|$ETAT_WARRANTY    | TRUE or FALSE |

