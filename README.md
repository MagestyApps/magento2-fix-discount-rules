# magento2-fix-discount-rules
If you try to create a new discount rule by "Payment Method" in Magento 2.1.8 +, you'll notice that option "Payment Method" in rules options is no longer available. The Magento team members have removed this option due to a bug. This condition means that the discount will be applied in case a customer selects a certain payment method. But actually, this rule will not work due to a small omission in Magento 2 checkout, that's the razon why core team removed this option. The module in the repo fixes both cases, turns the option visible again and corrects its behavior.

## How to install:
* Create folder 'app/code/MagestyApps/FixRules/' in you Magento setup
* Extract the repo files to the folder
* Open console (terminal)
* In the console (terminal) navigate to your magento root folder:
   ```
   cd /path/to/your/magento
   ```
  
* Install the new module using the command below:
   ```
   php bin/magento setup:upgrade
   php bin/magento setup:di:compile
   ```

## Description
You can find some code explanations in our blog post: ["Cart Price Rules Based on Payment Method Don't Work"](https://www.magestyapps.com/blog/post/issue-cart-price-rules-based-on-payment-method-dont-work/)
And here a [stack overflow question](https://magento.stackexchange.com/questions/193645/why-was-cart-price-rule-based-on-payment-method-removed-from-magento-2-1-8) about the remotion of this option.
