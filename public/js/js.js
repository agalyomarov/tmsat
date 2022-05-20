$(document).ready(function() {
    $(".open_mob_menu").on("click", function() {
        $(this).toggleClass("active");
        $("header .row").toggleClass("active");
        $(".form_profile").toggleClass("hide");
        return false;
    });

    $(".main_pay_balance .pay_pay").on("click", function() {
        $(this).addClass("active");
        $(".main_pay_balance .transfer_pay").removeClass("active");
        $(".main_pay_balance .history_pay").removeClass("active");
        $(".main_pay_balance .pay_pay_item").removeClass("hide");
        $(".main_pay_balance .transfer_pay_item").addClass("hide");
        $(".main_pay_balance .history_pay_item").addClass("hide");
        return false;
    });

    $(".main_pay_balance .transfer_pay").on("click", function() {
        $(this).addClass("active");
        $(".main_pay_balance .pay_pay").removeClass("active");
        $(".main_pay_balance .history_pay").removeClass("active");
        $(".main_pay_balance .transfer_pay_item").removeClass("hide");
        $(".main_pay_balance .pay_pay_item").addClass("hide");
        $(".main_pay_balance .history_pay_item").addClass("hide");
        return false;
    });

    $(".main_pay_balance .history_pay").on("click", function() {
        $(this).addClass("active");
        $(".main_pay_balance .pay_pay").removeClass("active");
        $(".main_pay_balance .transfer_pay").removeClass("active");
        $(".main_pay_balance .history_pay_item").removeClass("hide");
        $(".main_pay_balance .pay_pay_item").addClass("hide");
        $(".main_pay_balance .transfer_pay_item").addClass("hide");
        return false;
    });

    $(".form_enter .tab_enter .reg").on("click", function() {
        $(".form_enter .enter_enter").addClass("hide");
        $(".form_enter .reg_reg").removeClass("hide");
        $(".form_enter .tab_enter .reg").addClass("active");
        $(".form_enter .tab_enter .enter").removeClass("active");
        return false;
    });
    $(".form_enter .tab_enter .enter").on("click", function() {
        $(".form_enter .reg_reg").addClass("hide");
        $(".form_enter .enter_enter").removeClass("hide");
        $(".form_enter .tab_enter .enter").addClass("active");
        $(".form_enter .tab_enter .reg").removeClass("active");
        return false;
    });

    $(".home .search_user .add_btn").on("click", function() {
        $(".profile_edit, html, body, .black_fon").addClass("active");
        $("html, body").animate({ scrollTop: 0 }, 500);
        return false;
    });

    $(".black_fon").on("click", function() {
        $(".profile_edit, html, body, .black_fon").removeClass("active");
        return false;
    });

    $(".profile_edit .cansel").on("click", function() {
        $(".profile_edit, html, body, .black_fon").removeClass("active");
        return false;
    });

    $(".top_scroll").on("click", function() {
        $("html, body").animate({ scrollTop: 0 }, 500);
        return false;
    });

    $(window).scroll(function() {
        if ($(window).scrollTop() > 50) {
            $("header").addClass("scroll");
        } else {
            $("header").removeClass("scroll");
        }
    });

    $(".all_user .item .list_btn").on("click mouseover", function() {
        $(".all_user .item").removeClass("active");
        $(this).parent().toggleClass("active");
        $(document).mouseover(function(e) {
            var container = $(".all_user .item");
            if (container.has(e.target).length === 0) {
                $(".all_user .item").removeClass("active");
            }
        });
        return false;
    });

    // $(".all_user .item .list_btn").focus(function() {
    //     $(this).parent().addClass("active");
    // });
    $(".all_user .item").blur(function() {
        // $(".all_user .item").removeClass("active");
        // console.log("test");
    });

    /* --------  SLIDER ---------- */
});