$(document).ready(function() {

    if (typeof data !== 'undefined') {

        var voteNumber = -1;
        var candidates = JSON.parse(data);
        var $number1 = $("#number1");
        var $number2 = $("#number2");

        var refreshVote = function (number) {
            if (number >= 0) {
                if (!$number1.text()) {
                    $number1.text(number);
                } else {
                    $number2.text(number);

                    voteNumber = parseInt($number1.text() + $number2.text());

                    $("#label_title").show();
                    $("#label_number").show();
                    $("#label_info").show();

                    var candidate = "";

                    for (var key in candidates) {
                        var item = candidates[key];

                        if (item.number === voteNumber) {
                            candidate = item;
                        }
                    }

                    if (candidate) {
                        $("#candidate_photo").show().attr("src", candidate.image);
                        $("#label_wrong").hide();
                        $("#label_null").hide();
                        $("#label_name").show();
                        $("#label_party").show();
                        $("#name").text(candidate.name);
                        $("#party").text(candidate.party);
                    } else {
                        $("#candidate_photo").hide();
                        $("#label_wrong").show().text("Número errado");
                        $("#label_null").show().text("Voto nulo");
                        $("#label_name").hide();
                        $("#label_party").hide();
                    }
                }
            }
        };

        $(".btn").click(function () {
            switch ($(this).attr("id")) {
                case "btn_0":
                    refreshVote(0);
                    break;
                case "btn_1":
                    refreshVote(1);
                    break;
                case "btn_2":
                    refreshVote(2);
                    break;
                case "btn_3":
                    refreshVote(3);
                    break;
                case "btn_4":
                    refreshVote(4);
                    break;
                case "btn_5":
                    refreshVote(5);
                    break;
                case "btn_6":
                    refreshVote(6);
                    break;
                case "btn_7":
                    refreshVote(7);
                    break;
                case "btn_8":
                    refreshVote(8);
                    break;
                case "btn_9":
                    refreshVote(9);
                    break;
                case "btn_white":
                    $number1.text("");
                    $number2.text("");
                    voteNumber = 0;

                    $number1.text("");
                    $number2.text("");

                    $("#candidate_photo").hide();
                    $("#label_title").show();
                    $("#label_wrong").hide();
                    $("#label_null").show().text("Voto em branco");
                    $("#label_number").hide();
                    $("#label_name").hide();
                    $("#label_party").hide();
                    $("#label_info").show();
                    break;
                case "btn_clear":
                    voteNumber = -1;

                    $number1.text("");
                    $number2.text("");

                    $("#candidate_photo").hide();
                    $("#label_title").hide();
                    $("#label_wrong").hide();
                    $("#label_null").hide();
                    $("#label_number").show();
                    $("#label_name").hide();
                    $("#label_party").hide();
                    $("#label_info").hide();
                    break;
                case "btn_confirm":
                    if (voteNumber !== -1) {
                        $("#loading").show();

                        $.ajax({
                            url: $("#voting").data("register"),
                            type: 'post',
                            data: {number: voteNumber},
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            dataType: 'json',
                            success: function (data) {
                                if (data.success) {
                                    cantVote();

                                    new Audio($("#voting").data("sound")).play();
                                } else {
                                    alert(data.message);
                                }

                                $("#loading").hide();
                            },
                            error: function () {
                                alert("Ops! Ocorreu um erro ao salvar seu voto, tente novamente.");
                                $("#loading").hide();
                            }
                        });
                    }
                    break;
            }
        });

    } else {

        cantVote();

    }

});

function cantVote() {
    $("#candidate_photo").hide();
    $("#label_role").hide();
    $("#label_title").hide();
    $("#label_wrong").hide();
    $("#label_null").hide();
    $("#label_number").hide();
    $("#label_name").hide();
    $("#label_party").hide();
    $("#label_info").hide();
    $("#label_end").show();
    $("#keyboard").addClass("disabled");
}