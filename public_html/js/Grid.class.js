/**
 * Created with JetBrains PhpStorm.
 * User: joaorca
 * Date: 10/08/12
 * Time: 10:46
 * To change this template use File | Settings | File Templates.
 */
var Grid = new function () {

    this.reload = function () {
        /*
         jQuery.ajax({
         type	:"POST",
         data	:$("#frmGrid").serialize(),
         url		:$("#url").val(),
         success	:function(data,textStatus)
         {
         jQuery("#gridBody").html(data);

         }
         });
         */
        $("#frmGrid").submit();
    };

    this.getStringFilters = function (hiddenStringFilters) {
        var filters = ""
        if (hiddenStringFilters) {
            filters = $("#filters").val();
        }
        else {
            $("*[class*='filterBy']").each(function (i, e) {
                filters += $(e).val();
            });
        }
        return filters;
    }

    this.search = function () {
        //$('#'+prefix+'currentPage').val(1);
        Grid.reload();
    };

    this.filter = function (e) {
        if (e && e.keyCode != 13) {
            return false;
        }
        //$('#' + prefix + 'currentPage').val(1);
        $("#filters").val(this.getStringFilters(false))
        this.reload()
    };

    this.sort = function (object) {
        var orderByField = $(object).attr("field");
        var orderBySort = $(object).hasClass("headerSortUp") ? "Desc" : "Asc";
        $("td[class*=orderBy]").removeClass("headerSortDown").removeClass("headerSortUp");
        $("#orderByField").val(orderByField);
        $("#orderBySort").val(orderBySort);
        $(object).addClass("headerSort" + (orderBySort == "Desc" ? "Down" : "Up"));
        this.reload();
    };

    this.checkSelectedSortField = function () {
        var orderByField = $("#orderByField").val();
        var orderBySort = $("#orderBySort").val();
        $("td[class*=orderBy]").each(function (index, element) {
            var field = $(element).attr("field")
            if (field == orderByField)
                $(element).addClass("headerSort" + (orderBySort == "Desc" ? "Down" : "Up"));
        });
    };

};