function ftbmc() {
    document.querySelector('#ftbmc_panel_a_tab').addEventListener('click', function (e) {
        document.querySelector('#ftbmc_panel_a_tab').classList.add('active');
        document.querySelector('#ftbmc_panel_b_tab').classList.remove('active');
        document.querySelector('#ftbmc_panel_a').classList.remove('ftbmc_hidden');
        document.querySelector('#ftbmc_panel_b').classList.add('ftbmc_hidden');
        document.querySelector('#ftbmc_panel_a_results').classList.remove('ftbmc_hidden');
        document.querySelector('#ftbmc_panel_b_results').classList.add('ftbmc_hidden');
    });

    document.querySelector('#ftbmc_panel_b_tab').addEventListener('click', function (e) {
        document.querySelector('#ftbmc_panel_a_tab').classList.remove('active');
        document.querySelector('#ftbmc_panel_b_tab').classList.add('active');
        document.querySelector('#ftbmc_panel_a').classList.add('ftbmc_hidden');
        document.querySelector('#ftbmc_panel_b').classList.remove('ftbmc_hidden');
        document.querySelector('#ftbmc_panel_a_results').classList.add('ftbmc_hidden');
        document.querySelector('#ftbmc_panel_b_results').classList.remove('ftbmc_hidden');
    });

    function getVal(e) {
        let v = parseInt(e.value);
        if (isNaN(v)) {
            return 0;
        }

        return v;
    }

    function format(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function ftbmc_calc_a() {
        var total_salary = (getVal(annual_salary) + getVal(partners_salary));
        var total_outgoings = getVal(monthly_outgoings) * 12;
        var total_amount = total_salary - total_outgoings;

        var multiplier = 4.5;
        if (total_amount > 30000) {
            multiplier = 5;
        }

        var total_borrow_amount = total_amount * multiplier;
        var ltv = (total_borrow_amount / (total_borrow_amount + getVal(deposit_amount))) * 100;
        var full_total = total_borrow_amount + getVal(deposit_amount);


        mortgage_amount.value = total_borrow_amount;
        document.querySelector('#ftbmc_value_amount').innerHTML = format(total_borrow_amount.toFixed(0));
        document.querySelector('#ftbmc_ltv').innerHTML = ltv.toFixed(2) + '%';
        document.querySelector('#ftbmc_explain').innerHTML = format(full_total.toFixed(0));

        ftbmc_calc_b();
    }

    function ftbmc_calc_b() {
        var amount = getVal(mortgage_amount);
        var terms = getVal(mortgage_terms) * 12;
        var rate = getVal(mortgage_interest_rate);
        rate = (rate / 100) / 12;
        var monthly = (amount / terms) + (amount * rate);

        if (monthly == 'Infinity') {
            monthly = '-';
        } else {
            monthly = format(monthly.toFixed(0));
        }

        document.querySelector('#ftbmc_value_amount_2').innerHTML = monthly;
    }

    var annual_salary = document.querySelector('#ftbmc_annual_salary');
    var partners_salary = document.querySelector('#ftbmc_partners_salary');
    var deposit_amount = document.querySelector('#ftbmc_deposit_amount');
    var monthly_outgoings = document.querySelector('#ftbmc_monthly_outgoings');

    annual_salary.addEventListener('change', function (e) {
        ftbmc_calc_a();
    });
    
    partners_salary.addEventListener('change', function (e) {ftbmc_calc_a();});
    deposit_amount.addEventListener('change', function (e) {ftbmc_calc_a();});
    monthly_outgoings.addEventListener('change', function (e) {ftbmc_calc_a();});

    var mortgage_amount = document.querySelector('#ftbmc_mortgage_amount');
    var mortgage_terms = document.querySelector('#ftbmc_mortgage_terms');
    var mortgage_interest_rate = document.querySelector('#ftbmc_mortgage_interest_rate');

    mortgage_amount.addEventListener('change', function (e) {ftbmc_calc_b();});
    mortgage_terms.addEventListener('change', function (e) {ftbmc_calc_b();});
    mortgage_interest_rate.addEventListener('change', function (e) {ftbmc_calc_b();});
}

ftbmc();