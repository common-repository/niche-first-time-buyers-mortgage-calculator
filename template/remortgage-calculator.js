function rmc() {
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

    function rmc_calc_a() {
        var amount = getVal(outstanding_amount);
        var terms = getVal(mortgage_terms) * 12;
        var rate = getVal(mortgage_interest_rate);
        rate = (rate / 100) / 12;
        var monthly = (amount / terms) + (amount * rate);

        if (monthly == 'Infinity') {
            monthly = 0;
        }

        var annual = monthly * 12;
        var current_annual = getVal(monthly_repayment) * 12;
        
        var diff = current_annual - annual;
        var diff_monthly = diff / 12;

        if (diff_monthly < 1 && getVal(monthly_repayment)) {
            document.querySelector('#rmc-a').style.display = 'none';
            document.querySelector('#rmc-b').style.display = 'block';
        } else {
            if (diff_monthly < 1) {
                diff_monthly = 0;
            }
            document.querySelector('#rmc-a').style.display = 'block';
            document.querySelector('#rmc-b').style.display = 'none';
        }

        document.querySelector('#rmc_value_amount').innerHTML = format(diff_monthly.toFixed(0));
    }

    var property_value = document.querySelector('#rmc_property_value');
    var outstanding_amount = document.querySelector('#rmc_outstanding_amount');
    var monthly_repayment = document.querySelector('#rmc_monthly_repayment');
    var mortgage_terms = document.querySelector('#rmc_mortgage_terms');
    
    property_value.addEventListener('change', function (e) {rmc_calc_a();});
    outstanding_amount.addEventListener('change', function (e) {rmc_calc_a();});
    monthly_repayment.addEventListener('change', function (e) {rmc_calc_a();});
    mortgage_terms.addEventListener('change', function (e) {rmc_calc_a();});
}

rmc();