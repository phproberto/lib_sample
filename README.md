Sample Joomla! library
==========

To use it as reference for 3rd party developers. It includes common libraries requirements:

* Setup autoloading
* Language autoloading
* Media folder + assets management
* Form fields
* Form rules
* JHtml helpers

## Use

To use the library you have to include and use it like:

```php
// Include the library
JLoader::import('sample.library');

// Load Assets from media
SampleHelperAsset::load('sample.css', 'sample');
SampleHelperAsset::load('sample.js', 'sample');

// Custom helper
$result = SampleHelperNumbers::sum(array(4,3));

// JHtml use
JHtml::_('sample.fontawesome');
```

## Form example

This is a sample form that uses the library form fields and form rules

```XML
<?xml version="1.0" encoding="utf-8"?>
<form>
    <fieldset addfieldpath="/libraries/sample/form/field" addrulepath="/libraries/sample/form/rule">
        <field
            name="username"
            type="text"
            label="COM_SAMPLE_FIELD_NAME"
            description="COM_SAMPLE_FIELD_NAME_DESC"
            validate="login"
		/>
        <field
            name="list"
            type="sample"
            label="COM_SAMPLE_FIELD_LIST"
            description="COM_SAMPLE_FIELD_LIST_DESC"
            default="1"
            >
        </field>
    </fieldset>
</form>
```

The first field uses the `login` form rule (which is just a copy&rename of the standard `username` joomla rule) to validate a username/login.

The second field uses a custom field defined inside the library (`sample`).
