<div id="ftbmc">

    <style>
        <?php $this->printInlineStyles(); ?>
    </style>

    <form id="ftbmc_form">

        <div class="ftbmc_grid">

            <div class="ftbmc_inputs">

                <div class="ftbmc_tabs">

                    <div id="ftbmc_panel_a_tab" data-for="ftbmc_panel_a" class="active"><?php echo __('How much can I borrow?', 'first-time-buyers-mortgage-calculator'); ?></div>

                    <div id="ftbmc_panel_b_tab" data-for="ftbmc_panel_b"><?php echo __('Mortgage Repayments', 'first-time-buyers-mortgage-calculator'); ?></div>

                </div>

                <div class="ftbmc_panels">

                    <div id="ftbmc_panel_a" class="ftbmc_panel">

                        <div>

                            <label for="ftbmc_annual_salary" class="ftbmc_label">
                                <?php echo __('What is your annual salary?', 'first-time-buyers-mortgage-calculator'); ?>
                            </label>

                            <div class="ftbmc-currency">

                                <span><?php echo esc_html($this->getPlaceholder('currency')); ?></span>

                                <input type="number" id="ftbmc_annual_salary" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('annual_salary')); ?>">

                            </div>

                        </div>

                        <div>

                            <label for="ftbmc_partners_salary" class="ftbmc_label">
                                <?php echo __('Partner\'s Salary (if applicable)', 'first-time-buyers-mortgage-calculator'); ?>
                            </label>

                            <div class="ftbmc-currency">

                                <span><?php echo esc_html($this->getPlaceholder('currency')); ?></span>

                                <input type="number" id="ftbmc_partners_salary" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('partners_salary')); ?>">

                            </div>

                        </div>

                        <div>

                            <label for="ftbmc_deposit_amount" class="ftbmc_label">
                                <?php echo __('Deposit Amount', 'first-time-buyers-mortgage-calculator'); ?>
                            </label>

                            <div class="ftbmc-currency">

                                <span><?php echo esc_html($this->getPlaceholder('currency')); ?></span>

                                <input type="number" id="ftbmc_deposit_amount" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('deposit_amount')); ?>">

                            </div>

                        </div>

                        <div>

                            <label for="ftbmc_monthly_outgoings" class="ftbmc_label">
                                <?php echo __('Regular Monthly Outgoings (optional)', 'first-time-buyers-mortgage-calculator'); ?>
                            </label>

                            <div class="ftbmc-currency">

                                <span><?php echo esc_html($this->getPlaceholder('currency')); ?></span>

                                <input type="number" id="ftbmc_monthly_outgoings" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('monthly_outgoings')); ?>">

                            </div>

                        </div>

                    </div>

                    <div id="ftbmc_panel_b" class="ftbmc_panel ftbmc_hidden">

                        <div>

                            <label for="ftbmc_mortgage_amount" class="ftbmc_label">
                                <?php echo __('Mortgage Amount', 'first-time-buyers-mortgage-calculator'); ?>
                            </label>

                            <div class="ftbmc-currency">

                                <span><?php echo esc_html($this->getPlaceholder('currency')); ?></span>

                                <input type="number" id="ftbmc_mortgage_amount" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('mortgage_amount')); ?>">

                            </div>

                        </div>

                        <div>

                            <label for="ftbmc_mortgage_terms" class="ftbmc_label">
                                <?php echo __('Mortgage Term', 'first-time-buyers-mortgage-calculator'); ?>
                            </label>

                            <div class="ftbmc-years">

                                <span class="years">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M1 4c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4zm2 2v12h14V6H3zm2-6h2v2H5V0zm8 0h2v2h-2V0zM5 9h2v2H5V9zm0 4h2v2H5v-2zm4-4h2v2H9V9zm0 4h2v2H9v-2zm4-4h2v2h-2V9zm0 4h2v2h-2v-2z" />
                                    </svg>
                                </span>

                                <input type="number" id="ftbmc_mortgage_terms" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('mortgage_terms')); ?>" 
                                    value="<?php echo esc_attr($this->getPlaceholder('mortgage_terms')); ?>">

                            </div>

                        </div>

                        <div>

                            <label for="ftbmc_mortgage_interest_rate" class="ftbmc_label">
                                <?php echo __('Mortgage Interest Rates (%)', 'first-time-buyers-mortgage-calculator'); ?>
                            </label>

                            <div class="ftbmc-currency">

                                <span>%</span>

                                <input type="number" id="ftbmc_mortgage_interest_rate" min="0" max="100" 
                                    placeholder="<?php echo esc_attr($this->getPlaceholder('mortgage_interest_rate')); ?>" 
                                    value="<?php echo esc_attr($this->getPlaceholder('mortgage_interest_rate')); ?>">

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="ftbmc_results">

                <div id="ftbmc_panel_a_results">

                    <div>

                        <div class="ftbmc_top">

                            <div><?php echo __('You could borrow up to:', 'first-time-buyers-mortgage-calculator'); ?></div>

                            <div class="ftbmc_value"><?php echo esc_html($this->getPlaceholder('currency')); ?><span id="ftbmc_value_amount">0</span></div>

                        </div>

                        <div class="ftbmc_ltv">

                            <div><?php echo __('Loan to Value (LTV):', 'first-time-buyers-mortgage-calculator'); ?></div>

                            <div id="ftbmc_ltv">100%</div>

                        </div>

                        <div class="ftbmc_explain">

                            <?php echo __('Including your deposit, you could afford a house price up to £', 'first-time-buyers-mortgage-calculator'); ?><span id="ftbmc_explain">--</span>

                        </div>

                    </div>

                </div>

                <div id="ftbmc_panel_b_results" class="ftbmc_hidden">

                    <div>

                        <div class="ftbmc_top">

                            <div><?php echo __('Your monthly mortgage repayment:', 'first-time-buyers-mortgage-calculator'); ?></div>

                            <div class="ftbmc_value"><?php echo esc_html($this->getPlaceholder('currency')); ?><span id="ftbmc_value_amount_2">0</span></div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </form>

    <div class="ftbmc_credit">

        First Time Buyers Mortgage Calculator Provided by <a href="https://nichemortgageinfo.co.uk/first-time-buyers/calculator/" target="_blank">Niche Mortgage Info</a>.

    </div>

</div>

<script>
    <?php $this->printInlineScript(); ?>
</script>