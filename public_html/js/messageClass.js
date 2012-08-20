/**
 * Created by IntelliJ IDEA.
 * User: joaorca
 * Date: 09/07/12
 * Time: 14:04
 * To change this template use File | Settings | File Templates.
 */

var Message = {

    showFieldMessage:function (field, message, cssClass) {
        $("label[for='" + field + "']").parent().addClass(cssClass);
        $("label[for='" + field + "']").parent().children("div.controls").append("<span class='help-inline'>" + message + "</span>");
    }

};