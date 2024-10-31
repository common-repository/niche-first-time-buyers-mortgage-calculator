<div id="ssmc">

    <style>
        <?php $this->printInlineStyles(); ?>
    </style>

    <form id="ssmc_form">

        <h3 class="ssmc_title"><?php echo __('Income', 'self-employed-mortgage-calculator'); ?></h3>

        <div class="ssmc_block">

            <label for="ssmc_employment_status" class="ssmc_label"><?php echo __('What is your employment status?', 'self-employed-mortgage-calculator'); ?></label>

            <select id="ssmc_employment_status">
                <option value=""><?php echo __('-- Select Status --', 'self-employed-mortgage-calculator'); ?></option>
                <option value="sole_trader"><?php echo __('Sole Trader', 'self-employed-mortgage-calculator'); ?></option>
                <option value="partnership"><?php echo __('Partnership', 'self-employed-mortgage-calculator'); ?></option>
                <option value="director"><?php echo __('Director with Shareholding', 'self-employed-mortgage-calculator'); ?></option>
                <option value="contractor"><?php echo __('Contractor', 'self-employed-mortgage-calculator'); ?></option>
            </select>

        </div>

        <div id="ssmc_sole_trader" class="ssmc_block ssmc-hide">

            <label for="ssmc_sole_trader_profit" class="ssmc_label"><?php echo __('Your latest years net profit?', 'self-employed-mortgage-calculator'); ?></label>

            <div class="ssmc-currency">

                <span><?php echo esc_html($this->getPlaceholder('currency')); ?></span>

                <input type="number" id="ssmc_sole_trader_profit" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('sole_trader_profit')); ?>">

            </div>

        </div>

        <div id="ssmc_partnership" class="ssmc_block ssmc-hide">

            <label for="ssmc_partnership_profit" class="ssmc_label"><?php echo __('Your share of the latest years net profit?', 'self-employed-mortgage-calculator'); ?></label>

            <div class="ssmc-currency">

                <span><?php echo esc_html($this->getPlaceholder('currency')); ?></span>

                <input type="number" id="ssmc_partnership_profit" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('partnership_profit')); ?>">

            </div>

        </div>

        <div id="ssmc_director" class="ssmc_block ssmc-hide">

            <div class="ssmc-grid">

                <div>

                    <label for="ssmc_director_salary" class="ssmc_label"><?php echo __('Your salary drawn in the last 12 months?', 'self-employed-mortgage-calculator'); ?></label>

                    <div class="ssmc-currency">

                        <span><?php echo esc_html($this->getPlaceholder('currency')); ?></span>

                        <input type="number" id="ssmc_director_salary" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('director_salary')); ?>">

                    </div>

                </div>

                <div>

                    <label for="ssmc_director_dividends" class="ssmc_label"><?php echo __('Dividends for the last 12 months?', 'self-employed-mortgage-calculator'); ?></label>

                    <div class="ssmc-currency">

                        <span><?php echo esc_html($this->getPlaceholder('currency')); ?></span>

                        <input type="number" id="ssmc_director_dividends" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('director_dividends')); ?>">

                    </div>

                </div>

            </div>

        </div>

        <div id="ssmc_contractor" class="ssmc_block ssmc-hide">

            <div class="ssmc-grid">

                <div>

                    <label for="ssmc_contractor_daily_rate" class="ssmc_label"><?php echo __('What is your daily rate?', 'self-employed-mortgage-calculator'); ?></label>

                    <div class="ssmc-currency">

                        <span><?php echo esc_html($this->getPlaceholder('currency')); ?></span>

                        <input type="number" id="ssmc_contractor_daily_rate" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('contractor_daily_rate')); ?>">

                    </div>

                </div>

                <div>

                    <label for="ssmc_contractor_annual_days" class="ssmc_label"><?php echo __('Average number of work days annually?', 'self-employed-mortgage-calculator'); ?></label>

                    <div class="ssmc-currency">

                        <input type="number" id="ssmc_contractor_annual_days" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('contractor_annual_days_placeholder')); ?>">

                    </div>

                </div>

            </div>

        </div>

        <h3 class="ssmc_title"><?php echo __('Outgoings', 'self-employed-mortgage-calculator'); ?></h3>

        <div class="ssmc_block">

            <div class="ssmc-grid">

                <div>

                    <label for="ssmc_outgoing_personal_loan" class="ssmc_label"><?php echo __('Monthly Personal Loan Payments:', 'self-employed-mortgage-calculator'); ?></label>

                    <div class="ssmc-currency">

                        <span><?php echo esc_html($this->getPlaceholder('currency')); ?></span>

                        <input type="number" id="ssmc_outgoing_personal_loan" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('outgoing_personal_loan')); ?>">

                    </div>

                </div>

                <div>

                    <label for="ssmc_outgoing_car_finance" class="ssmc_label"><?php echo __('Monthly Car Finance:', 'self-employed-mortgage-calculator'); ?></label>

                    <div class="ssmc-currency">

                        <span><?php echo esc_html($this->getPlaceholder('currency')); ?></span>

                        <input type="number" id="ssmc_outgoing_car_finance" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('outgoing_car_finance')); ?>">

                    </div>

                </div>

                <div>

                    <label for="ssmc_outgoing_child_care" class="ssmc_label"><?php echo __('Monthly Child Care:', 'self-employed-mortgage-calculator'); ?></label>

                    <div class="ssmc-currency">

                        <span><?php echo esc_html($this->getPlaceholder('currency')); ?></span>

                        <input type="number" id="ssmc_outgoing_child_care" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('outgoing_child_care')); ?>">

                    </div>

                </div>

                <div>

                    <label for="ssmc_outgoing_school_fees" class="ssmc_label"><?php echo __('Monthly School Fees:', 'self-employed-mortgage-calculator'); ?></label>

                    <div class="ssmc-currency">

                        <span><?php echo esc_html($this->getPlaceholder('currency')); ?></span>

                        <input type="number" id="ssmc_outgoing_school_fees" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('outgoing_school_fees')); ?>">

                    </div>

                </div>

                <div>

                    <label for="ssmc_outgoing_total_cc_balance" class="ssmc_label"><?php echo __('Monthly Credit Card Payments:', 'self-employed-mortgage-calculator'); ?></label>

                    <div class="ssmc-currency">

                        <span><?php echo esc_html($this->getPlaceholder('currency')); ?></span>

                        <input type="number" id="ssmc_outgoing_total_cc_balance" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('outgoing_total_cc_balance')); ?>">

                    </div>

                </div>

                <div></div>

            </div>

        </div>

        <button id="ssmc_calculate" type="submit"><?php echo __('Calculate', 'self-employed-mortgage-calculator'); ?></button>

        <div id="ssmc_value" class="hidden">
            <?php echo __('You could borrow up to', 'self-employed-mortgage-calculator'); ?>
            <b><?php echo esc_html($this->getPlaceholder('currency')); ?><span id="ssmc_value_amount">0</span></b>
        </div>

    </form>

    <div class="ssmc_credit">

        Self Employed Mortgage Calculator Provided by <a href="https://nichemortgageinfo.co.uk/self-employed-mortgages/calculator/" target="_blank">Niche Mortgage Info</a>.

    </div>

</div>

<script>
    <?php $this->printInlineScript(); ?>
</script>