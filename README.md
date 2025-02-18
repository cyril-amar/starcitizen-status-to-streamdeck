# Star Citizen Status to Streamdeck
Display an icon on your StreamDeck based on current Star Citizen status (https://status.robertsspaceindustries.com/index.xml).

Status is cached server-side for 15 minutes. 

[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=cyril-amar_starcitizen-status-to-streamdeck&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=cyril-amar_starcitizen-status-to-streamdeck)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=cyril-amar_starcitizen-status-to-streamdeck&metric=security_rating)](https://sonarcloud.io/summary/new_code?id=cyril-amar_starcitizen-status-to-streamdeck)
[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=cyril-amar_starcitizen-status-to-streamdeck&metric=vulnerabilities)](https://sonarcloud.io/summary/new_code?id=cyril-amar_starcitizen-status-to-streamdeck)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=cyril-amar_starcitizen-status-to-streamdeck&metric=bugs)](https://sonarcloud.io/summary/new_code?id=cyril-amar_starcitizen-status-to-streamdeck)

## Requirements
Server side
- PHP 8.0+
- `allow_fopen_url = 1`
- Read-write rights on a `cache` file located at the web root directory

For your Elgato Streamdeck
- Elgato Streamdeck or equivalent
- API Ninja plugin, by BarRaider (https://marketplace.elgato.com/product/api-ninja-fd59edeb-e7e5-412f-91ef-304c3e03f035)

## Installation

1. Copy all files to your webserver.
2. Install API Ninja plugin, if not already.
3. Create a new key with API Ninja and configure it as follows:
```
    Request Type                    GET
    API URL                         https://<your-domain.tld/path/to>/index.php
    Response Type                   Treeat response as image for key
    Autorun every                   15 Minutes
    Hide green success indicator    yes
```

## Usage
If no icon is shown after installation, press the key to initialize. A red, green or white icon should appear.

Status will be updated every 15 minutes (as per `Autorun every` configuration value), you can trigger it manually by pressing the key. Note that results are cached by the server for 15 minutes: you will not be able to force a refresh from your Streamdeck device.

### No open issues have been found
![sc_ok.png](sc_ok.png)

### At least an open issue has been found
![sc_ko.png](sc_ko.png)

### An error occurred and the status couldn't be updated
![sc_err.png](sc_err.png)