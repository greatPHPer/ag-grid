<?php
$pageTitle = "Set Filter: Enterprise Grade Feature of our Datagrid";
$pageDescription = "Enterprise feature of ag-Grid supporting Angular, React, Javascript and more. One such feature is Set Filter. Set Filter works like Excel, providing checkboxes to select values from a set. Version 20 is available for download now, take it for a free two month trial.";
$pageKeywords = "ag-Grid JavaScript Data Grid Excel Set Filtering";
$pageGroup = "feature";
include '../documentation-main/documentation_header.php';
?>

<h1 class="heading-enterprise">Set Filter - API</h1>

<p class="lead">
    The Set Filter takes inspiration from Excel's AutoFilter and allows filtering on sets of data. It is built on top of
    the shared functionality that is common across all <a href="../javascript-grid-filter-provided/">Provided Filters</a>.
</p>

<h2>Set Filter Model</h2>

<p>
    Get and set the state of the set filter by getting and setting the model on the filter instance.
</p>

<?= createSnippet(<<<SNIPPET
// get filter instance (Note - React users must use the async version
// of this method by passing a callback parameter)
var countryFilterComponent = gridOptions.api.getFilterInstance('country');

// get filter model
var model = countryFilterComponent.getModel();

// set filter model and update
countryFilterComponent.setModel({
    type: 'set',
    values: ['Spain', 'Ireland', 'South Africa', 'Australia', 'England']
});

gridApi.onFilterChanged();
SNIPPET
) ?>

<p>
    The filter model contains an array of string values where each item in the array corresponds to an
    element to be selected from the set.
</p>

<h2>Set Filter API</h2>

<p>
    The set filter has the following API (in addition to the <a href="../javascript-grid-filter-provided/#providedFilterApi">API</a> common to all provided filters):
</p>

<?php createDocumentationFromFile('setFilter.json', 'api') ?>

<p>
    It is important to note that when updating the set filter through the API, it is up to the developer to call
    <code>filterInstance.applyModel()</code> to apply the changes that have been made to the model and then
    <code>gridOptions.api.onFilterChanged()</code> at the end of the interaction with the filter.
</p>
<p>
    If no call is made to <code>filterInstance.applyModel()</code> then the filter UI will show the changes, but
    it won't be reflected in the filter model. This will appear as if the user never hit the Apply button (regardless
    of whether the Apply button is active or not).
</p>
<p>
    If no call to <code>gridOptions.api.onFilterChanged()</code> is provided the grid will still show the data relevant to the filter
    before it was updated through the API.
</p>

<p>This code demonstrates a correct update:</p>

<?= createSnippet(<<<SNIPPET
// Get filter instance
var instance = gridOptions.api.getFilterInstance('athlete');

// Set filter properties
instance.selectNothing();
instance.selectValue('John Joe Nevin');
instance.selectValue('Kenny Egan');

// Apply the model
instance.applyModel();

// Get the grid to refresh the rows based on new filter
gridOptions.api.onFilterChanged();
SNIPPET
) ?>

<p>
    In the example below, you can see how the filter for the Athlete column is modified through the API and how at the
    end of the interaction a call to <code>gridOptions.api.onFilterChanged()</code> is performed.
</p>

<?= grid_example('Set Filter API', 'set-filter-api', 'generated', ['enterprise' => true, 'exampleHeight' => 570]) ?>


<h2>Set Filter Parameters</h2>

<?php createDocumentationFromFile('setFilter.json', 'filterParams') ?>

<?php include '../documentation-main/documentation_footer.php';?>
