/**
 * Created by IntelliJ IDEA.
 * User: joaorca
 * Date: 06/07/12
 * Time: 16:17
 * To change this template use File | Settings | File Templates.
 */

var Util = {

    updateContainer:function (container, data) {
        $("#" + container).html(data);
    },

    ajax:function (url, container, parameters) {
        jQuery.ajax({
            type:"POST",
            url:url,
            data:parameters,
            success:function (data, textStatus) {
                Util.updateContainer(container, data)
            },
            beforeSend:function () {
                Form.cleanErrors()
            }
        });
    },

    capitalize:function (str) {
        return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
            return $1.toUpperCase();
        });
    },

    divtoggle:function (divName, exibe) {
        if (exibe) {
            $("div[class*=" + divName + "]").show()
        }
        else {
            $("div[class*=" + divName + "]").hide()
        }
        //$("div[class*=enemBox]").children("[class=controls]").children().each(function(i,e){ if ($(e).val()){ $(e).val("") } });
    }

};