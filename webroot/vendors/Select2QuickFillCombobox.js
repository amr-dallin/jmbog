/**
 * Select2QuickFillCombobox - A HTML select component that uses Select2 to add a button for adding items to a select when no options are found in the search.
 *
 * @param $select2_el                                           The jQuery select element
 * @param {Object}  [options]
 * @param {Object}  [options.no_results_add_button_callback]    A function to call after the button as been added
 * @param {Boolean} [options.no_results_add_button_template]    The button HTML template to use
 * @constructor
 */
function Select2QuickFillCombobox($select2_el, options) {

    this.$select2_el = $select2_el;
    this.options = options || {};
    var defaults = {
        no_results_add_button_callback: null,
        no_results_add_button_template: '' +
            '<button type="button" class="btn btn-default">' +
            '    <span class="glyphicon glyphicon-plus-sign"></span> Add Item' +
            '</button>'
    };

    var select2_options = $.extend(defaults, this.options);

    if (this.$select2_el.data('select2')) {
        this.$select2_el.select2('destroy');
    }
    this.$select2_el.select2(select2_options);
    this.override_select2_display_message_method();

}

Select2QuickFillCombobox.prototype = {

    override_select2_display_message_method: function() {

        jQuery.fn.select2.amd.require('select2/results').prototype.displayMessage = function(params) {

            var escapeMarkup = this.options.get('escapeMarkup');

            this.clear();
            this.hideLoading();

            var $message = $(
                '<li role="treeitem" aria-live="assertive"' +
                ' class="select2-results__option"></li>'
            );

            var message = this.options.get('translations').get(params.message);
            var no_results_add_button_template =  this.options.get('no_results_add_button_template');
            var no_results_add_button_callback =  this.options.get('no_results_add_button_callback');
            message = message(params.args);

            if (params.message == 'noResults' && no_results_add_button_template) {

                var $add_btn = $(no_results_add_button_template);
                $message.append($add_btn);
                if (no_results_add_button_callback) {
                    no_results_add_button_callback($add_btn);
                }

            } else {
                $message.append(escapeMarkup(message));
            }

            $message[0].className += ' select2-results__message';

            this.$results.append($message);
        };
    }
};