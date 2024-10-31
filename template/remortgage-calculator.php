<div id="rmc">

    <style>
        <?php $this->printInlineStyles(); ?>
    </style>

    <form id="rmc_form">

        <div class="rmc_grid">

            <div class="rmc_inputs">

                <div class="rmc_panels">

                    <div id="rmc_panel_a" class="rmc_panel">

                        <div>

                            <label for="rmc_property_value" class="rmc_label">
                                <?php echo __('Property Value?', 'remortgage-calculator'); ?>
                            </label>

                            <div class="rmc-currency">

                                <span><?php echo esc_html($this->getPlaceholder('currency')); ?></span>

                                <input type="number" id="rmc_property_value" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('property_value')); ?>">

                            </div>

                        </div>

                        <div>

                            <label for="rmc_outstanding_amount" class="rmc_label">
                                <?php echo __('Outstanding Mortgage Amount', 'remortgage-calculator'); ?>
                            </label>

                            <div class="rmc-currency">

                                <span><?php echo esc_html($this->getPlaceholder('currency')); ?></span>

                                <input type="number" id="rmc_outstanding_amount" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('outstanding_amount')); ?>">

                            </div>

                        </div>

                        <div>

                            <label for="rmc_monthly_repayment" class="rmc_label">
                                <?php echo __('Current Monthly Repayment', 'remortgage-calculator'); ?>
                            </label>

                            <div class="rmc-currency">

                                <span><?php echo esc_html($this->getPlaceholder('currency')); ?></span>

                                <input type="number" id="rmc_monthly_repayment" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('monthly_repayment')); ?>">

                            </div>

                        </div>

                        <div>

                            <label for="rmc_mortgage_terms" class="rmc_label">
                                <?php echo __('Mortgage Term', 'remortgage-calculator'); ?>
                            </label>

                            <div class="rmc-years">

                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M1 4c0-1.1.9-2 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4zm2 2v12h14V6H3zm2-6h2v2H5V0zm8 0h2v2h-2V0zM5 9h2v2H5V9zm0 4h2v2H5v-2zm4-4h2v2H9V9zm0 4h2v2H9v-2zm4-4h2v2h-2V9zm0 4h2v2h-2v-2z" />
                                    </svg>
                                </span>

                                <input type="number" id="rmc_mortgage_terms" min="0" placeholder="<?php echo esc_attr($this->getPlaceholder('mortgage_terms')); ?>" 
                                    value="<?php echo esc_attr($this->getPlaceholder('mortgage_terms')); ?>">

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="rmc_results">

                <div id="rmc_panel_a_results">

                    <div>

                        <div id="rmc-a" class="rmc_top">

                            <div><?php echo __('You could save up to:', 'remortgage-calculator'); ?></div>

                            <div class="rmc_value"><?php echo esc_html($this->getPlaceholder('currency')); ?><span id="rmc_value_amount">0</span></div>

                            <div><?php echo __('per year on your mortgage.', 'remortgage-calculator'); ?></div>

                        </div>

                        <div id="rmc-b" class="rmc_top">

                            <div class="rmc_value">
                                <?php echo __('Looks like your on a good deal.', 'remortgage-calculator'); ?>
                            </div>

                        </div>

                        <div class="rmc_explain">
                            <p><?php echo __('This is based on a new 2-year fixed rate mortgage with an interest rate of ' . esc_html($this->getPlaceholder('interest_rate')) . '%.'); ?></p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </form>

    <div class="rmc_credit">

        Remortgage Calculator Provided by <a href="https://nichemortgageinfo.co.uk/remortgaging/calculator/" target="_blank">Niche Mortgage Info</a>.

    </div>

</div>

<script>
    var mortgage_interest_rate = <?php echo esc_html($this->getPlaceholder('interest_rate') / 100); ?>;
    <?php $this->printInlineScript(); ?>
</script>