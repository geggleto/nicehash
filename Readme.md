# Nicehash Buying Power Profit Calculator

Use at your own risk. Revenue estimations are from nanopool/WhatToMine and are estimations. Your results will vary.
This will not print you money. Don't spend what you cannot afford to lose.

If you have a feature request then open an issue on github.

### Supported Currencies Nanopool
- XMR
- ETH
- ETC
- ZEC
- Pascal
- Sia

### Supported WhatToMine Currencies
- BTC
- Dash
- LTC

### TODO

### Suite Runner

I have added a suite runner so you can define the currencies you want to check for. It defaults to all.
just comment out the ones you don't care about. If nothing is outputted then there is nothing that is profitable.

```
php cli/runner.php
```


#### Output

```
> php cli/runner.php 
#################################################
PROFIT RUNNER CRYPTO MINING TOOL
Tip Addr: 34qs5Pup438Y2qe4yLzrhgKTbHMXK1uNkt BTC
#################################################

Reporting on btc
Reporting on dash
Reporting on etc
ETC - EUR
 Cost 0.0243 BTC/GH/Day
 Revenue: 0.024477 BTC/GH/Day
 Profit: 0.000177

ETC - USD
 Cost 0.0238 BTC/GH/Day
 Revenue: 0.024477 BTC/GH/Day
 Profit: 0.000677

Reporting on eth
ETH - USD
 Cost 0.0238 BTC/GH/Day
 Revenue: 0.023912 BTC/GH/Day
 Profit: 0.000112

Reporting on ltc
Reporting on pascal
Pascal - EUR
 Cost 0.2518 BTC/TH/Day
 Revenue: 0.348915 BTC/TH/Day
 Profit: 0.097115

Pascal - USD
 Cost 0.3053 BTC/TH/Day
 Revenue: 0.348915 BTC/TH/Day
 Profit: 0.043615

Reporting on sia
Reporting on xmr
Reporting on zec
Completed Run. If there was no output there's no profitable currencies
```
