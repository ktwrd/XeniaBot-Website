# About Warn System
The warning system that is implemented into Xenia is pretty standard and is similar to other bots.

Xenia includes a section on the dashboard for showing what warns are recorded in your server. In the future, each warn record will include ways to attach evidence and methods to edit the warn description.

{#strike-system}
## Strike System
As of v1.11, a Strike System has been added on-top of the existing Warn System. With this Strike System, you can configure when a Warn should actually account to what actions should be taken against a user. This has been implemented by marking warns as "Active" and "Inactive".

{#strike-system-aboutinactive}
### Inactive Warns
An "Inactive" warn is a warn where it's older than the configured "Strike Window" (which can be set via the Dashboard or with Commands). These types of warns appear as if they don't exist when using the new `/warns` command.

<div class="row align-items-start mt-4">
    <div class="col is-half is-full-mobile">
        Inactive Warns will look something like this in the Dashboard
    </div>
    <div class="col is-half is-full-mobile">
        <img src="https://res.kate.pet/upload/9f17ee3a9705/firefox_MV4uYGedDr.png" class="guide-img" />
    </div>
</div>

{#strike-system-aboutactive}
### Active Warns
An "Active" warn is a warn where it was created within the "Strike Window" (which can be set via the Dashboard or with Commands). These types of warns appear as they used to before v1.11, and should be treated as they were before.

<div class="row align-items-start mt-4">
    <div class="col is-half is-full-mobile">
        Active Warns will look something like this in the Dashboard
    </div>
    <div class="col is-half is-full-mobile">
        <img src="https://res.kate.pet/upload/f1af16536980/firefox_j9DfKLtigA.png" class="guide-img" />
    </div>
</div>

{#strike-system-maxcount}
### Maximum Strike Count
When the Strike System is enabled, you can define a Maximum Strike Count which decides how many Active Warns it takes before a punishment should be actioned on a user. Just like the previous options, this can be set via the Dashboard or with Commands.

The Maximum Strike Count is also referred to as the "Warn Threshold" or the "Strike Limit".