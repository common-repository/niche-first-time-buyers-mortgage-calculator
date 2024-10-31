function ssmc() {
    var ssmc_multiplier = 4.5;
    var ssmc_employment_status = document.querySelector('#ssmc_employment_status');
    var ssmc_outgoing_car_finance = document.querySelector('#ssmc_outgoing_car_finance');
    var ssmc_outgoing_child_care = document.querySelector('#ssmc_outgoing_child_care');
    var ssmc_outgoing_personal_loan = document.querySelector('#ssmc_outgoing_personal_loan');
    var ssmc_outgoing_school_fees = document.querySelector('#ssmc_outgoing_school_fees');
    var ssmc_outgoing_total_cc_balance = document.querySelector('#ssmc_outgoing_total_cc_balance');

    ssmc_employment_status.addEventListener('change', function (e) {
        let value = ssmc_employment_status.value;
        console.log(value);
        document.querySelector('#ssmc_sole_trader').classList.add('ssmc-hide');
        document.querySelector('#ssmc_partnership').classList.add('ssmc-hide');
        document.querySelector('#ssmc_director').classList.add('ssmc-hide');
        document.querySelector('#ssmc_contractor').classList.add('ssmc-hide');
        document.querySelector('#ssmc_' + value).classList.remove('ssmc-hide');
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

    document.querySelector('#ssmc_form').addEventListener('submit', function (e) {
        e.preventDefault();

        let total_outgoings = getVal(ssmc_outgoing_car_finance) + getVal(ssmc_outgoing_child_care) + getVal(ssmc_outgoing_personal_loan) + getVal(ssmc_outgoing_school_fees) + getVal(ssmc_outgoing_total_cc_balance);
        total_outgoings = total_outgoings * 12;
        
        let total_income = 0;

        if (ssmc_employment_status.value == 'sole_trader') {
            total_income = getVal(document.querySelector('#ssmc_sole_trader_profit'));
        } else if (ssmc_employment_status.value == 'partnership') {
            total_income = getVal(document.querySelector('#ssmc_partnership_profit'));
        } else if (ssmc_employment_status.value == 'director') {
            total_income = getVal(document.querySelector('#ssmc_director_salary')) + getVal(document.querySelector('#ssmc_director_dividends'));
        } else if (ssmc_employment_status.value == 'contractor') {
            total_income = getVal(document.querySelector('#ssmc_contractor_daily_rate')) * getVal(document.querySelector('#ssmc_contractor_annual_days'));
        }

        console.log(total_income);
        console.log(total_income - total_outgoings);
        let total_borrow_amount = Math.ceil((total_income - total_outgoings) * ssmc_multiplier);

        if (isNaN(total_borrow_amount) || total_borrow_amount < 0) {
            total_borrow_amount = 0;
        }

        document.querySelector('#ssmc_value_amount').innerHTML = format(total_borrow_amount.toFixed(0));
        
        document.querySelector('#ssmc_value').classList.remove('hidden');

        return false;
    });
}

ssmc();