#!/usr/bin/env php
<?php
use CloudServicesManagement\CloudServiceManager;
use WindowsAzure\ServiceManagement\Models\DeploymentSlot;

require_once(dirname(__FILE__) . '/../vendor/autoload.php');

if (empty($argv[1]) || empty($argv[2]) || !is_readable($argv[2]) || empty($argv[3])) {
    echo 'Usage: php reboot.php <subscription-id> <certificate-filepath> <service-name> [<instance-name>]';
    exit(1);
}
$subscriptionId = $argv[1];
$certificateFile = $argv[2];
$serviceName = $argv[3];
if (!empty($argv[4])) {
    $targetInstance = $argv[4];
}

$manager = new CloudServiceManager($subscriptionId, $certificateFile);
$manager->reboot($serviceName, DeploymentSlot::PRODUCTION, $targetInstance);
