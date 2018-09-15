/**
 * Created by jiaying on 15/11/14.
 */
var isalert = false;
var runtimes = 0;

$(function () {

    setInterval("GetRTime()", 1000);

    $(".upd-stuprogram").click(function () {
        var eid = $("#examid").val();
        var pid = $(this).data('pid');
        var panel = "collapseExample" + pid;
        var accepted = $("#" + panel).data('accepted');
        if (accepted != 1) {
            $.ajax({
                url: saveprogram,
                type: "POST",
                dataType: "html",
                data: 'eid=' + eid + '&pid=' + pid,
                success: function (data) {
                    if (data == 4) {
                        $("#" + panel).data('accepted', 1).html("此题你已正确!");//slideUp("slow", function(){$(this).remove();});
                    }
                },
                error: function () {
                    console.log('error update program');
                }
            });
        }
    });

    $("#savePaper").click(function () {
        if (questionType == 1) {
            savePaper(chooseSaveUrl, "chooseExam");
        } else if (questionType == 2) {
            savePaper(judgeSaveUrl, "judgeExam");
        } else if (questionType == 3) {
            savePaper(fillSaveUrl, "fillExam");
        } else if (questionType == 4) {
            $("#saveover").html("编程题无需保存");
        }
    });

    $(".submitcode").click(function () {
        var pid = $(this).data('programid');
        var data = $("#codeForm" + pid).serialize();
        data = data + "&id=" + pid + "&eid=" + $("#examid").val();
        $.ajax({
            url: codesubmiturl,
            data: data,
            type: "POST",
            dataType: "html",
            success: function (data) {
                $("#span" + pid).html(data);
            },
            error: function () {
                alert("something error when you submit")
            }
        });
    });

    $(".updateresult").click(function () {
        var pid = $(this).data('proid');
        var eid = $("#examid").val();
        var span = "span" + pid;
        updateResult(this, span, pid, eid);
    });

    antiCheat();
});

function updateResult(e, spanId, problemId, examId) {
    var that = $(e);
    that.attr("disabled", true);
    that.html("Loading Now...");
    $.ajax({
        url : updresulturl,
        type: "GET",
        dataType: "html",
        data: "id=" + problemId + "&eid=" + examId + "&sid=" + Math.random(),
        success: function (e) {
            $("#" + spanId).html(e);
        },
        error: function () {
            alert("something error when you submit")
        }
    });
    setTimeout(function () {
        that.attr("disabled", false);
        that.html("点击刷新结果");
    }, 4e3);
}

function submitChoosePaper() {
    $("#chooseExam").submit();
}

function submitJudgePaper() {
    $("#judgeExam").submit();
}

function submitFillPaper() {
    $("#fillExam").submit();
}

function submitProgramPaper() {
    $("#programExam").submit();
}

function examFormSubmit() {
    var problemType = $("#problemType").val();
    if (problemType == 1) {
        submitChoosePaper();
    } else if (problemType == 2) {
        submitJudgePaper();
    } else if (problemType == 3) {
        submitFillPaper();
    } else if (problemType == 4) {
        submitProgramPaper();
    } else {
        alert("page error, please refresh~");
    }
}

function savePaper(saveUrl, formId) {
    var that = $("#saveover");
    $.ajax({
        url: saveUrl,
        type: "POST",
        dataType: "html",
        data: $("#" + formId).serialize(),
        success: function (e) {
            0 < e ? (that.html("[已保存]"), setTimeout(function () {
                $("#saveover").html("")
            }, 6e3)) : that.html("[保存失败]");
            if (e > 0) {
                left = e * 1000;
                runtimes = 0;
            }
        },
        error: function () {
            alert("something error when you save")
        }
    });
}

function antiCheat() {
    var problemType = $("#problemType").val();
    if (problemType != 4) {
        $(".myOpacity").rotate(-45);
        $("body").keydown(function (event) {
            if (event.keyCode == 116) {
                event.returnValue = false;
                alert("当前设置不允许使用F5刷新键");
                return false;
            }
            if ((event.ctrlKey) && (event.keyCode == 83)) {
                event.returnValue = false;
                return false;
            }
            if (event.ctrlKey) {
                event.returnValue = false;
                return false;
            }
            if (event.altKey) {
                event.returnValue = false;
                return false;
            }
            if (event.keyCode == 123) {
                event.returnValue = false;
                alert("当前设置不允许使用F12键");
                return false;
            }
        });
        $("html").mouseleave(function () {
            //alert('鼠标请不要离开当前考试页面!多次尝试可能会被强制交卷哦!');
        });
    }
}

function GetRTime() {
    var nMS = left - runtimes * 1000;
    if (nMS > 0) {
        var nH = Math.floor(nMS / (1000 * 60 * 60));
        var nM = Math.floor(nMS / (1000 * 60)) % 60;
        var nS = Math.floor(nMS / 1000) % 60;
        var nHstr = (nH >= 10 ? nH : "0" + nH);
        var nMstr = (nM >= 10 ? nM : "0" + nM);
        var nSstr = (nS >= 10 ? nS : "0" + nS);
        $("#RemainH").html(nHstr);
        $("#RemainM").html(nMstr);
        $("#RemainS").html(nSstr);
        if (nMS <= 5 * 60 * 1000 && isalert == false) {
            $('.tixinga').css("color", "red");
            $('.tixingb').css("color", "red");
            isalert = true;
        }
        var _qType = parseInt(questionType);
        if (nMS > 0 && nMS <= 1000) {
            switch (_qType) {
                case 1 :
                    submitChoosePaper();
                    break;
                case 2 :
                    submitJudgePaper();
                    break;
                case 3 :
                    submitFillPaper();
                    break;
                case 4 :
                    submitProgramPaper();
            }
        }

        if (nMS % savetime == 0 && nMS > savetime) {
            switch (_qType) {
                case 1 :
                    savePaper(chooseSaveUrl, "chooseExam");
                    break;
                case 2 :
                    savePaper(judgeSaveUrl, "judgeExam");
                    break;
                case 3 :
                    savePaper(fillSaveUrl, "fillExam");
                    break;
            }
            runtimes = 0;
        }
        runtimes++;
    }
}
