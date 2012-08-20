/**
 * Created by IntelliJ IDEA.
 * User: joaorca
 * Date: 06/07/12
 * Time: 16:15
 * To change this template use File | Settings | File Templates.
 */

var Form = {

    inputNumberOnly:function (event) {
        return (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) ? false : true;
    },

    cleanFieldError:function (field) {
        $(field).parent().parent().removeClass("error");
        $(field).parent().children().remove("span")
    },

    cleanErrors:function () {
        $("#divAuxiliarAjax").html("");
        $("label").parent().removeClass("error")
        $("label").parent().children("div.controls").children().remove("span")
    },

    showErrorMessage:function (field, message) {
        Message.showFieldMessage(field, message, "error")
    }

};