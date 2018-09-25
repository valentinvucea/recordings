/*global $:false, jQuery:false */
/*jshint strict:false */

$(document).ready(function() {
    search.init();

    /** Add a new row in search form */
    $('#searchAdd').on('click', function () {
        search.addRow();
    });

    /** Add a new row in pairs search form */
    $('#pairSearchAdd').on('click', function () {
        search.addRow();
    });

    var searchForm = 'form';

    /** Pair type onChange event */
    $(searchForm).on('change', 'select[id^="pairType"]', function () {
        search.pairTypeChange(this);
    });

    /** Remove existing row in the search form */
    $(searchForm).on('click', '.btn-remove', function () {
        search.removeRow(this);
    });

    /** Validation on submit */
    $('#searchSubmit').on('click', function (event) {
        event.preventDefault();
        var validation = search.validateNewRow();

        if (validation.length === 0) {
            $('form[name="frmSearch"]').submit();
        } else {
            window.alert(validation.join('\n'));
        }
    });

    /** Validation on pair submit */
    $('#searchPairSubmit').on('click', function (event) {
        event.preventDefault();
        var validation = search.validateNewRow();

        if (validation.length === 0) {
            $('form[name="frmPairSearch"]').submit();
        } else {
            window.alert(validation.join('\n'));
        }
    });

    /** Tab change */
    $('a.search-tab').on('click', function () {
        event.preventDefault();
        var tabs = ['general', 'pair'];
        var activeTab = $(this).attr('data-tab');
        tabs.splice(tabs.indexOf(activeTab), 1);

        /** Active tab */
        $('[data-tab="'+activeTab+'"]').addClass('active');
        $('.'+activeTab+'Search').addClass('active');

        /** Hidden tab */
        $('[data-tab="'+tabs[0]+'"]').removeClass('active');
        $('.'+tabs[0]+'Search').removeClass('active');
    });
});

var search = {
    form: $('#frmSearch'),
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
        '<option value="5">Recordings</option>' +
        '<option value="1">Choirs</option>' +
        '<option value="4">Directors</option>' +
        '<option value="2">Composers</option>' +
        '<option value="3">Compositions</option>' +
        '</select>' +
        '</div>' +
        '<div class="col-2">' +
        '<button type="button" class="btn-remove" id="searchRemove_#x#">-</button>' +
        '</div>' +
        '</div>',
    pairRowTemplate: '<div id="row_#x#" class="hrow grid">' +
        '<div class="col-3">' +
        '<select id="pairType_#x#" name="rowPair[#x#][pairType]">' +
        '<option selected value="0">Pair type</option>' +
        '<option value="1">Composer-Composition</option>' +
        '<option value="2">Choir-Director</option>' +
        '</select>' +
        '</div>' +
        '<div class="col-4">' +
        '<input type="text" id="searchTerm_1_#x#" name="rowPair[#x#][searchTerm_1]" placeholder="Search term..." />' +
        '</div>' +
        '<div class="col-4">' +
        '<input type="text" id="searchTerm_2_#x#" name="rowPair[#x#][searchTerm_2]" placeholder="Search term..." />' +
        '</div>' +
        '<div class="col-1">' +
        '<button type="button" class="btn-remove" id="searchRemove_#x#">-</button>' +
        '</div>' +
        '</div>',
    container: $('.generalSearch'),
    pairContainer: $('.pairSearch'),
    count: 0,
    pairCount: 0,
    pairs: {
        1: {
            1: 'Composer',
            2: 'Composition'
        },
        2: {
            1: 'Choir',
            2: 'Director'
        }
    },

    init: function () {
        var lastRowId = $('form div[id^=row_]').last().attr('id').replace('row_', '');
        this.count = parseInt(lastRowId);
    },

    addRow: function () {
        var validation = this.validateNewRow();
        var searchType = $('a.active').attr('data-tab');

        if (validation.length === 0) {
            if ('general' === searchType) {
                this.addSearchRow();
            } else {
                this.addPairSearchRow();
            }
        } else {
            window.alert(validation.join('\n'));
        }
    },

    addSearchRow: function () {
        this.count = this.count + 1;
        var operatorWidth = ('list' === this.container.attr('data-page') ? '1' : '2');
        var searchTermWidth = ('list' === this.container.attr('data-page') ? '6' : '5');

        var html = this.rowTemplate
            .replace(/#x#/g, this.count)
            .replace(/#y#/g, operatorWidth)
            .replace(/#z#/g, searchTermWidth);

        $('.add-row-before').before(html);
    },

    addPairSearchRow: function () {
        this.pairCount = this.pairCount + 1;

        var html = this.pairRowTemplate
            .replace(/#x#/g, this.pairCount);

        $('.add-pair-row-before').before(html);
    },

    pairTypeChange: function (obj) {
        var row = $(obj).attr('id').split(/[_]+/).pop();
        var type = $(obj).val();

        var firstInput = '#searchTerm_1_' + row;
        $(firstInput).prop('placeholder', 'Search ' + search.pairs[type][1] + '...');

        var secondInput = '#searchTerm_2_' + row;
        $(secondInput).prop('placeholder', 'Search ' + search.pairs[type][2] + '...');
    },

    removeRow: function (obj) {
        var row = $(obj).attr('id').split(/[_]+/).pop();
        $('#row_'+row).remove();
    },

    validateNewRow: function () {
        var validation = [];

        $('.active input[id^=searchTerm]').each(function (index, input) {
            var rowNo = parseInt($(input).attr('id').split(/[_]+/).pop()) + 1;
            var searchTerm = $(input).val().trim();
            if ('' === searchTerm || searchTerm.length < 3) {
                validation.push('Empty or too short search term for row ' + rowNo);
            }
        });

        return validation;
    }
};