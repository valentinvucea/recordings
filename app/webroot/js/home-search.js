/*global $:false, jQuery:false */
/*jshint strict:false */

$(document).ready(function() {
    /** Add a new row in search form */
    $('#searchAdd').on('click', function () {
        search.addRow();
    });

    /** Remove existing row in the search form */
    $('form').on('click', '.btn-remove', function () {
        search.removeRow(this);
    });
});

var search = {
    form: $('#frmSearch'),
    count: 0,
    rowTemplate: '<div id="row_#x#" class="hrow grid">' +
        '<div class="col-1">' +
        '<select id="searchOperator_#x#" name="row[#x#][searchOperator]">' +
        '<option value="AND">AND</option>' +
        '<option value="OR">OR</option>' +
        '</select>' +
        '</div>' +
        '<div class="col-5">' +
        '<input type="text" id="searchTerm_#x#" name="row[#x#][searchTerm]" placeholder="Search term..." />' +
        '</div>' +
        '<div class="col-4">' +
        '<select id="searchTable_#x#" name="row[#x#][searchTable]">' +
        '<option value="0">All tables</option>' +
        '<option value="1">Choirs</option>' +
        '<option value="2">Composers</option>' +
        '<option value="3">Compositions</option>' +
        '<option value="4">Directors</option>' +
        '<option value="5">Recordings</option>' +
        '</select>' +
        '</div>' +
        '<div class="col-2">' +
        '<button type="button" class="btn-remove" id="searchRemove_#x#">-</button>' +
        '</div>' +
        '</div>',

    addRow: function () {
        this.count = this.count + 1;
        var html = this.rowTemplate.replace(/#x#/g, this.count);
        $('.submit-row').before(html);
    },

    removeRow: function (obj) {
        var row = $(obj).attr('id').split(/[_]+/).pop();
        $('#row_'+row).remove();
    }
};

