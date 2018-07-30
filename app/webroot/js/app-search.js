/*global $:false, jQuery:false */
/*jshint strict:false */

$(document).ready(function() {
    search.init();

    /** Add a new row in search form */
    $('#searchAdd').on('click', function () {
        search.addRow();
    });

    /** Remove existing row in the search form */
    $('form').on('click', '.btn-remove', function () {
        search.removeRow(this);
    });

    /** Validation on submit */
    $('#searchSubmit').on('click', function (event) {
        event.preventDefault();
        var validation = search.validateNewRow();

        if (validation.length === 0) {
            $('form').submit();
        } else {
            window.alert(validation.join('\n'));
        }
    });
});

var search = {
    form: $('#frmSearch'),
    container: $('.appSearch'),
    count: 0,
    rowTemplate: '<div id="row_#x#" class="hrow grid">' +
        '<div class="col-#y#">' +
        '<select id="searchOperator_#x#" name="row[#x#][searchOperator]">' +
        '<option value="AND">AND</option>' +
        '<option value="OR">OR</option>' +
        '</select>' +
        '</div>' +
        '<div class="col-#z#">' +
        '<input type="text" id="searchTerm_#x#" name="row[#x#][searchTerm]" placeholder="Search term..." />' +
        '</div>' +
        '<div class="col-3">' +
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

    init: function () {
        var lastRowId = $('form div[id^=row_]').last().attr('id').replace('row_', '');
        this.count = parseInt(lastRowId);
    },

    addRow: function () {
        var validation = this.validateNewRow();

        if (validation.length === 0) {
            this.count = this.count + 1;
            var operatorWidth = ('list' === this.container.attr('data-page') ? '1' : '2');
            var searchTermWidth = ('list' === this.container.attr('data-page') ? '6' : '5');

            var html = this.rowTemplate
                .replace(/#x#/g, this.count)
                .replace(/#y#/g, operatorWidth)
                .replace(/#z#/g, searchTermWidth);

            $('.submit-row').before(html);
        } else {
            window.alert(validation.join('\n'));
        }
    },

    removeRow: function (obj) {
        var row = $(obj).attr('id').split(/[_]+/).pop();
        $('#row_'+row).remove();
    },

    validateNewRow: function () {
        var validation = [];

        $('[id^=searchTerm]').each(function (index, input) {
            var rowNo = index + 1;
            var searchTerm = $(input).val().trim();
            if ('' === searchTerm || searchTerm.length < 3) {
                validation.push('Empty or too short search term for row ' + rowNo);
            }
        });

        return validation;
    }
};