/* ------------------------------------------------------------------------------
*
*  # Table elements
*
*  Specific JS code additions for table_elements.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {


    // Selects
    // ------------------------------

    // Multiselect
    $('.multiselect').multiselect({
        buttonWidth: '100%'
    });


    // SelectBoxIt selects
    $(".selectbox").selectBoxIt({
        autoWidth: false 
    });


    // Select2 basic
    $('.select').select2({
        minimumResultsForSearch: '-1'
    });


    //
    // Select2 with icons
    //

    // Add icons
    function iconFormat(state) {
        var originalOption = state.element;
        return "<i class='icon-" + $(originalOption).data('icon') + "'></i>" + state.text;
    }

    // Initialize
    $(".select-actions").select2({
        minimumResultsForSearch: -1,
        formatResult: iconFormat,
        width: '100%',
        formatSelection: iconFormat,
        escapeMarkup: function(m) { return m; }
    });


    //
    // "Display controls" select2 select
    //

    // Initialize Switchery
    var controls = document.querySelector('.display-controls');
    var controlsInit = new Switchery(controls);

    // Change select state on toggle
    controls.onchange = function() {
        if(controls.checked) {
            $('#available_controls').select2("enable", true);
        }
        else {
            $('#available_controls').select2("enable", false);
        }
    };



    // Editable
    // ------------------------------

    // Change defaults
    $.fn.editable.defaults.highlight = false;
    $.fn.editable.defaults.mode = 'popup';
    $.fn.editableform.template = '<form class="editableform">' +
        '<div class="control-group">' +
        '<div class="editable-input"></div> <div class="editable-buttons"></div>' +
        '<div class="editable-error-block"></div>' +
        '</div> ' +
        '</form>';
    $.fn.editableform.buttons = 
        '<button type="submit" class="btn btn-info btn-icon editable-submit"><i class="icon-check"></i></button>' +
        '<button type="button" class="btn btn-default btn-icon editable-cancel"><i class="icon-x"></i></button>';


    // Initialize
    $('#edit').editable();


    //
    // Edit popup with switchery toggle
    //

    // Initialize editable
    $('#switchery-editable').editable({
        source: {'1': 'Enabled'},
        emptytext: 'Disabled',
        showbuttons: 'bottom',
        tpl: '<div class="checkbox checkbox-switchery switchery-xs"></div>'
    });

    // Initialize plugin
    $('#switchery-editable').on('shown', function (e, editable) {
        editable.input.$input.addClass('switcher-single');

        var elem = document.querySelector('.switcher-single');
        var init = new Switchery(elem);
    });



    // Sparklines
    // ------------------------------

    // Intialization
    $(".spark-line").sparkline('html', {
        type: 'line',
        lineColor: '#aaa',
        spotRadius: 2,
        enableTagOptions: true,
        minSpotColor: '',
        maxSpotColor: '',
        height: 22,
        fillColor: '#f5f5f5',
        width: 150,
        lineWidth: 1.1
    });


    // Composite
    $('.spark-comoposite').sparkline('html', {
        type: 'bar',
        barColor: '#aaf',
        barWidth: 6,
        height: 22,
        barColor: '#009AD6'
    });
    $('.spark-comoposite').sparkline([4,1,5,7,9,9,8,7,6,6,4,7,8,4,3,2,2,5,6,7], {
        composite: true,
        fillColor: false,
        lineColor: 'red'
    });


    // Bar charts
    $('.spark-bars').sparkline('html', {
        type: 'bar',
        height: 22,
        negBarColor: '#f65f5f',
        stackedBarColor: ['#009AD6','#f65f5f'],
        barWidth: 6,
        barColor: '#009AD6'
    });


    // Pie charts
    $('.spark-pies').sparkline('html', {
        type: 'pie',
        height: 22,
        sliceColors: ['#2CA02C', '#FF7F0E', '#1F77B4']
    });


    // Bullet charts
    $('.spark-bullet').sparkline('html', {
        type: 'bullet',
        width: 150,
        height: 22
    });



    // Form components
    // ------------------------------

    // Touchspin spinners
    $(".touchspin").TouchSpin({
        min: 0,
        max: 100,
        step: 0.1,
        decimals: 2,
        prefix: '$'
    });


    // Multiple files uploader
    $('.bootstrap-uploader').fileinput({
        browseLabel: 'Browse',
        browseClass: 'btn btn-primary',
        removeLabel: '',
        uploadLabel: '',
        browseIcon: '',
        uploadIcon: '<i class="icon-upload"></i> ',
        removeClass: 'btn btn-danger btn-icon',
        uploadClass: 'btn btn-default btn-icon',
        removeIcon: '<i class="icon-remove3"></i> ',
        layoutTemplates: {
            caption: '<div tabindex="-1" class="form-control file-caption {class}">\n' + '<span class="icon-file-plus kv-caption-icon"></span><div class="file-caption-name"></div>\n' + '</div>'
        },
        initialCaption: "No file selected"
    });


    // Switchery toggle
    var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
    elems.forEach(function(html) {
        var switchery = new Switchery(html);
    });


    // Styled checkboxes, radios
    $('.styled, .multiselect-container input').uniform({
        radioClass: 'choice',
        wrapperClass: 'border-primary text-primary'
    });


    // Styled file input
    $('.file-styled').uniform({
        wrapperClass: 'bg-warning',
        fileButtonHtml: '<i class="icon-googleplus5"></i>'
    });
    
});
