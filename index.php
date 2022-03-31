<?php

use alertCMC\Crawler;
use Maknz\Slack\Client as SlackClient;
use Maknz\Slack\Message;

require __DIR__ . '/vendor/autoload.php'; // Composer's autoloader
$arr = [
    "https://coinmarketcap.com/currencies/9d-nft/",
    "https://coinmarketcap.com/currencies/fluity/                                  ",
    "https://coinmarketcap.com/currencies/birdchain/                               ",
    "https://coinmarketcap.com/currencies/open-governance-token/                   ",
    "https://coinmarketcap.com/currencies/extradna/                                ",
    "https://coinmarketcap.com/currencies/netbox-coin/                             ",
    "https://coinmarketcap.com/currencies/cue-protocol/                            ",
    "https://coinmarketcap.com/currencies/bscview/                                 ",
    "https://coinmarketcap.com/currencies/bishares/                                ",
    "https://coinmarketcap.com/currencies/zcore/                                   ",
    "https://coinmarketcap.com/currencies/innovative-bioresearch-coin/             ",
    "https://coinmarketcap.com/currencies/squirrel-finance/                        ",
    "https://coinmarketcap.com/currencies/bitcash/                                 ",
    "https://coinmarketcap.com/currencies/hyper-alloy/                             ",
    "https://coinmarketcap.com/currencies/bsclaunch/                               ",
    "https://coinmarketcap.com/currencies/twinci/                                  ",
    "https://coinmarketcap.com/currencies/kwikswap/                                ",
    "https://coinmarketcap.com/currencies/bitblocks-finance/                       ",
    "https://coinmarketcap.com/currencies/ubu-finance/                             ",
    "https://coinmarketcap.com/currencies/tutti-frutti/                            ",
    "https://coinmarketcap.com/currencies/sechain/                                 ",
    "https://coinmarketcap.com/currencies/nft-alley/                               ",
    "https://coinmarketcap.com/currencies/hyper-finance/                           ",
    "https://coinmarketcap.com/currencies/wallet-swap/                             ",
    "https://coinmarketcap.com/currencies/dpk/                                     ",
    "https://coinmarketcap.com/currencies/scallop/                                 ",
    "https://coinmarketcap.com/currencies/starsharks-sss/                          ",
    "https://coinmarketcap.com/currencies/bitrise-token/                           ",
    "https://coinmarketcap.com/currencies/bunnypark/                               ",
    "https://coinmarketcap.com/currencies/titi-financial/                          ",
    "https://coinmarketcap.com/currencies/kunci-coin/                              ",
    "https://coinmarketcap.com/currencies/ovr/                                     ",
    "https://coinmarketcap.com/currencies/elephant-money/                          ",
    "https://coinmarketcap.com/currencies/mcontent/                                ",
    "https://coinmarketcap.com/currencies/pancakebunny/                            ",
    "https://coinmarketcap.com/currencies/yvs-finance/                             ",
    "https://coinmarketcap.com/currencies/srnartgallery/                           ",
    "https://coinmarketcap.com/currencies/vox-finance/                             ",
    "https://coinmarketcap.com/currencies/xion-finance/                            ",
    "https://coinmarketcap.com/currencies/goose-finance/                           ",
    "https://coinmarketcap.com/currencies/cafeswap-token/                          ",
    "https://coinmarketcap.com/currencies/sparkpoint-fuel/                         ",
    "https://coinmarketcap.com/currencies/smoothy/                                 ",
    "https://coinmarketcap.com/currencies/paybswap/                                ",
    "https://coinmarketcap.com/currencies/yellow-road/                             ",
    "https://coinmarketcap.com/currencies/typhoon-network/                         ",
    "https://coinmarketcap.com/currencies/rigel-protocol/                          ",
    "https://coinmarketcap.com/currencies/gourmet-galaxy/                          ",
    "https://coinmarketcap.com/currencies/collateral-pay/                          ",
    "https://coinmarketcap.com/currencies/afen-blockchain/                         ",
    "https://coinmarketcap.com/currencies/robust-protocol/                         ",
    "https://coinmarketcap.com/currencies/mmocoin/                                 ",
    "https://coinmarketcap.com/currencies/daoventures/                             ",
    "https://coinmarketcap.com/currencies/dinoexchange/                            ",
    "https://coinmarketcap.com/currencies/bonfi/                                   ",
    "https://coinmarketcap.com/currencies/acoconut/                                ",
    "https://coinmarketcap.com/currencies/zuki-moba/                               ",
    "https://coinmarketcap.com/currencies/kalata/                                  ",
    "https://coinmarketcap.com/currencies/kingdom-game-4/                          ",
    "https://coinmarketcap.com/currencies/bunicorn/                                ",
    "https://coinmarketcap.com/currencies/unifarm/                                 ",
    "https://coinmarketcap.com/currencies/defisocial-gaming-new/                   ",
    "https://coinmarketcap.com/currencies/mochi-market/                            ",
    "https://coinmarketcap.com/currencies/shake/                                   ",
    "https://coinmarketcap.com/currencies/porta/                                   ",
    "https://coinmarketcap.com/currencies/cryptotrains/                            ",
    "https://coinmarketcap.com/currencies/singularity-gold/                        ",
    "https://coinmarketcap.com/currencies/dragon-verse/                            ",
    "https://coinmarketcap.com/currencies/genshiro/                                ",
    "https://coinmarketcap.com/currencies/moonstarter/                             ",
    "https://coinmarketcap.com/currencies/heropark/                                ",
    "https://coinmarketcap.com/currencies/planet-sandbox/                          ",
    "https://coinmarketcap.com/currencies/elon-goat/                               ",
    "https://coinmarketcap.com/currencies/yfione/                                  ",
    "https://coinmarketcap.com/currencies/xsl-labs/                                ",
    "https://coinmarketcap.com/currencies/alium-finance/                           ",
    "https://coinmarketcap.com/currencies/world-of-defish/                         ",
    "https://coinmarketcap.com/currencies/copiosa-coin/                            ",
    "https://coinmarketcap.com/currencies/gspi-governance/                         ",
    "https://coinmarketcap.com/currencies/vention/                                 ",
    "https://coinmarketcap.com/currencies/zoo-crypto-world/                        ",
    "https://coinmarketcap.com/currencies/meblox-protocol/                         ",
    "https://coinmarketcap.com/currencies/platinx/                                 ",
    "https://coinmarketcap.com/currencies/moon-nation-game/                        ",
    "https://coinmarketcap.com/currencies/dungeonswap/                             ",
    "https://coinmarketcap.com/currencies/yearn-classic-finance/                   ",
    "https://coinmarketcap.com/currencies/battle-pets/                             ",
    "https://coinmarketcap.com/currencies/battlesaga/                              ",
    "https://coinmarketcap.com/currencies/launchpool/                              ",
    "https://coinmarketcap.com/currencies/tronpad/                                 ",
    "https://coinmarketcap.com/currencies/plastiks/                                ",
    "https://coinmarketcap.com/currencies/cardence-io/                             ",
    "https://coinmarketcap.com/currencies/graviton-zero/                           ",
    "https://coinmarketcap.com/currencies/eifi-finance/                            ",
    "https://coinmarketcap.com/currencies/april/                                   ",
    "https://coinmarketcap.com/currencies/eqifi/                                   ",
    "https://coinmarketcap.com/currencies/your-future-exchange/                    ",
    "https://coinmarketcap.com/currencies/crosswallet/                             ",
    "https://coinmarketcap.com/currencies/roseon-finance/                          ",
    "https://coinmarketcap.com/currencies/trustpad/                                ",
    "https://coinmarketcap.com/currencies/heroes-and-empires/                      ",
    "https://coinmarketcap.com/currencies/dnaxcat-token/                           ",
    "https://coinmarketcap.com/currencies/warrior-token-spartan-casino/            ",
    "https://coinmarketcap.com/currencies/despace-protocol/                        ",
    "https://coinmarketcap.com/currencies/ekta/                                    ",
    "https://coinmarketcap.com/currencies/anime-token/                             ",
    "https://coinmarketcap.com/currencies/trade-race-manager/                      ",
    "https://coinmarketcap.com/currencies/duckie-land/                             ",
    "https://coinmarketcap.com/currencies/infinity-skies/                          ",
    "https://coinmarketcap.com/currencies/purefi-protocol/                         ",
    "https://coinmarketcap.com/currencies/magiccraft/                              ",
    "https://coinmarketcap.com/currencies/terablock/                               ",
    "https://coinmarketcap.com/currencies/bsc-tools/                               ",
    "https://coinmarketcap.com/currencies/dinox/                                   ",
    "https://coinmarketcap.com/currencies/betfury/                                 ",
    "https://coinmarketcap.com/currencies/memepad/                                 ",
    "https://coinmarketcap.com/currencies/hummingbird-finance/                     ",
    "https://coinmarketcap.com/currencies/drip-network/                            ",
    "https://coinmarketcap.com/currencies/metastrike/                              ",
    "https://coinmarketcap.com/currencies/pancake-hunny/                           ",
    "https://coinmarketcap.com/currencies/bat-true-share/                          ",
    "https://coinmarketcap.com/currencies/jurassic-crypto/                         ",
    "https://coinmarketcap.com/currencies/fanspel/                                 ",
    "https://coinmarketcap.com/currencies/mammon/                                  ",
    "https://coinmarketcap.com/currencies/strite/                                  ",
    "https://coinmarketcap.com/currencies/metaniagames/                            ",
    "https://coinmarketcap.com/currencies/waultswap/                               ",
    "https://coinmarketcap.com/currencies/ramenswap/                               ",
    "https://coinmarketcap.com/currencies/safelaunch/                              ",
    "https://coinmarketcap.com/currencies/asva-finance/                            ",
    "https://coinmarketcap.com/currencies/the-everlasting-parachain/               ",
    "https://coinmarketcap.com/currencies/rasta-finance/                           ",
    "https://coinmarketcap.com/currencies/planet-finance/                          ",
    "https://coinmarketcap.com/currencies/space-token/                             ",
    "https://coinmarketcap.com/currencies/bsc-gold/                                ",
    "https://coinmarketcap.com/currencies/hugo-finance/                            ",
    "https://coinmarketcap.com/currencies/quidax/                                  ",
    "https://coinmarketcap.com/currencies/feeder-finance/                          ",
    "https://coinmarketcap.com/currencies/cryptoxpress/                            ",
    "https://coinmarketcap.com/currencies/kickpad/                                 ",
    "https://coinmarketcap.com/currencies/xwin-finance/                            ",
    "https://coinmarketcap.com/currencies/jojo/                                    ",
    "https://coinmarketcap.com/currencies/polkacipher/                             ",
    "https://coinmarketcap.com/currencies/bdollar-share/                           ",
    "https://coinmarketcap.com/currencies/euler-tools/                             ",
    "https://coinmarketcap.com/currencies/omni-token/                              ",
    "https://coinmarketcap.com/currencies/kiwi-finance/                            ",
    "https://coinmarketcap.com/currencies/one-basis-cash/                          ",
    "https://coinmarketcap.com/currencies/tigerfinance/                            ",
    "https://coinmarketcap.com/currencies/investdex/                               ",
    "https://coinmarketcap.com/currencies/toad-network/                            ",
    "https://coinmarketcap.com/currencies/dreamdao/                                ",
    "https://coinmarketcap.com/currencies/safe-token/                              ",
    "https://coinmarketcap.com/currencies/peachfolio/                              ",
    "https://coinmarketcap.com/currencies/seed/                                    ",
    "https://coinmarketcap.com/currencies/trustworks/                              ",
    "https://coinmarketcap.com/currencies/h2finance/                               ",
    "https://coinmarketcap.com/currencies/olive-cash/                              ",
    "https://coinmarketcap.com/currencies/cryptoskates/                            ",
    "https://coinmarketcap.com/currencies/zcore-finance/                           ",
    "https://coinmarketcap.com/currencies/kalissa/                                 ",
    "https://coinmarketcap.com/currencies/zodiacs/                                 ",
    "https://coinmarketcap.com/currencies/armzlegends/                             ",
    "https://coinmarketcap.com/currencies/omni-real-estate-token/                  ",
    "https://coinmarketcap.com/currencies/foxy-equilibrium/                        ",
    "https://coinmarketcap.com/currencies/kingdom-karnage/                         ",
    "https://coinmarketcap.com/currencies/vira-lata-finance/                       ",
    "https://coinmarketcap.com/currencies/mango-finance/                           ",
    "https://coinmarketcap.com/currencies/ebox/                                    ",
    "https://coinmarketcap.com/currencies/fishingtowngiltoken/                     ",
    "https://coinmarketcap.com/currencies/arena-token/                             ",
    "https://coinmarketcap.com/currencies/fire-token/                              ",
    "https://coinmarketcap.com/currencies/metaficial-world/                        ",
    "https://coinmarketcap.com/currencies/ultrasafe/                               ",
    "https://coinmarketcap.com/currencies/cryptofarming/                           ",
    "https://coinmarketcap.com/currencies/age-of-knights/                          ",
    "https://coinmarketcap.com/currencies/evodefi/                                 ",
    "https://coinmarketcap.com/currencies/toolape/                                 ",
    "https://coinmarketcap.com/currencies/lasereyes/                               ",
    "https://coinmarketcap.com/currencies/shuttleone/                              ",
    "https://coinmarketcap.com/currencies/nftswaps/                                ",
    "https://coinmarketcap.com/currencies/astronaut/                               ",
    "https://coinmarketcap.com/currencies/crossing-the-yellow-blocks/              ",
    "https://coinmarketcap.com/currencies/the-lab-finance/                         ",
    "https://coinmarketcap.com/currencies/sishi-finance/                           ",
    "https://coinmarketcap.com/currencies/tenet/                                   ",
    "https://coinmarketcap.com/currencies/tenet/                                   ",
    "https://coinmarketcap.com/currencies/bscex/                                   ",
    "https://coinmarketcap.com/currencies/doom-hero-dao/                           ",
    "https://coinmarketcap.com/currencies/fisher-vs-pirate/                        ",
    "https://coinmarketcap.com/currencies/sea-token/                               ",
    "https://coinmarketcap.com/currencies/ilus-coin/                               ",
    "https://coinmarketcap.com/currencies/fragments-of-arker/                      ",
    "https://coinmarketcap.com/currencies/revo-network/                            ",
    "https://coinmarketcap.com/currencies/b21-invest/                              ",
    "https://coinmarketcap.com/currencies/mermaid-swap/                            ",
    "https://coinmarketcap.com/currencies/treedefi/                                ",
    "https://coinmarketcap.com/currencies/eternal-cash/                            ",
    "https://coinmarketcap.com/currencies/fryworld/                                ",
    "https://coinmarketcap.com/currencies/cherrypick/                              ",
    "https://coinmarketcap.com/currencies/binamars/                                ",
    "https://coinmarketcap.com/currencies/eutaria/                                 ",
    "https://coinmarketcap.com/currencies/mocktailswap/                            ",
    "https://coinmarketcap.com/currencies/moonsdust/                               ",
    "https://coinmarketcap.com/currencies/the-smokehouse/                          ",
    "https://coinmarketcap.com/currencies/blizzard-money/                          ",
    "https://coinmarketcap.com/currencies/lexit/                                   ",
    "https://coinmarketcap.com/currencies/one-get-coin/                            ",
    "https://coinmarketcap.com/currencies/monster-slayer-finance/                  ",
    "https://coinmarketcap.com/currencies/zodiacdao/                               ",
    "https://coinmarketcap.com/currencies/pofi/                                    ",
    "https://coinmarketcap.com/currencies/absorber-protocol/                       ",
    "https://coinmarketcap.com/currencies/1tronic-network/                         ",
    "https://coinmarketcap.com/currencies/xpool/                                   ",
    "https://coinmarketcap.com/currencies/mochiswap/                               ",
    "https://coinmarketcap.com/currencies/bscstarter/                              ",
    "https://coinmarketcap.com/currencies/newb-farm/                               ",
    "https://coinmarketcap.com/currencies/momo-key/                                ",
    "https://coinmarketcap.com/currencies/swampy/                                  ",
    "https://coinmarketcap.com/currencies/block-ape-scissors/                      ",
    "https://coinmarketcap.com/currencies/less-network/                            ",
    "https://coinmarketcap.com/currencies/satozhi/                                 ",
    "https://coinmarketcap.com/currencies/dot-finance/                             ",
    "https://coinmarketcap.com/currencies/cargolink/                               ",
    "https://coinmarketcap.com/currencies/exip/                                    ",
    "https://coinmarketcap.com/currencies/crystal-of-dragon/                       ",
    "https://coinmarketcap.com/currencies/turtle-racing/                           ",
    "https://coinmarketcap.com/currencies/mybricks/                                ",
    "https://coinmarketcap.com/currencies/cryptosword/                             ",
    "https://coinmarketcap.com/currencies/moonarch-app/                            ",
    "https://coinmarketcap.com/currencies/happinesstoken/                          ",
    "https://coinmarketcap.com/currencies/swapz/                                   ",
    "https://coinmarketcap.com/currencies/harambe-protocol/                        ",
    "https://coinmarketcap.com/currencies/bloggercoin/                             ",
    "https://coinmarketcap.com/currencies/croxswap/                                ",
    "https://coinmarketcap.com/currencies/momo-protocol/                           ",
    "https://coinmarketcap.com/currencies/chickenkebab-finance/                    ",
    "https://coinmarketcap.com/currencies/hifi-gaming-society/                     ",
    "https://coinmarketcap.com/currencies/swincoin/                                ",
    "https://coinmarketcap.com/currencies/sting-defi/                              ",
    "https://coinmarketcap.com/currencies/bitbook/                                 ",
    "https://coinmarketcap.com/currencies/baby-pokemoon/                           ",
    "https://coinmarketcap.com/currencies/gorilla-diamond/                         ",
    "https://coinmarketcap.com/currencies/jetfuel-finance/                         ",
    "https://coinmarketcap.com/currencies/xmark/                                   ",
    "https://coinmarketcap.com/currencies/bamboo-defi/                             ",
    "https://coinmarketcap.com/currencies/supremacy/                               ",
    "https://coinmarketcap.com/currencies/trustfi-network/                         ",
    "https://coinmarketcap.com/currencies/paralink-network/                        ",
    "https://coinmarketcap.com/currencies/moonfarm-finance/                        ",
    "https://coinmarketcap.com/currencies/placewar/                                ",
    "https://coinmarketcap.com/currencies/duke-inu-token/                          ",
    "https://coinmarketcap.com/currencies/dfuture/                                 ",
    "https://coinmarketcap.com/currencies/fomo-lab/                                ",
    "https://coinmarketcap.com/currencies/greenheart-cbd/                          ",
    "https://coinmarketcap.com/currencies/iddle-cyber/                             ",
    "https://coinmarketcap.com/currencies/calo-app/                                ",
    "https://coinmarketcap.com/currencies/uncl/                                    ",
    "https://coinmarketcap.com/currencies/liquidifty/                              ",
    "https://coinmarketcap.com/currencies/game-ace-token/                          ",
    "https://coinmarketcap.com/currencies/mercor-finance/                          ",
    "https://coinmarketcap.com/currencies/bafi-finance/                            ",
    "https://coinmarketcap.com/currencies/black-eye-galaxy/                        ",
    "https://coinmarketcap.com/currencies/vulkania/                                ",
    "https://coinmarketcap.com/currencies/livenft/                                 ",
    "https://coinmarketcap.com/currencies/velorex/                                 ",
    "https://coinmarketcap.com/currencies/degen-protocol/                          ",
    "https://coinmarketcap.com/currencies/nominex-token/                           ",
    "https://coinmarketcap.com/currencies/artex/                                   ",
    "https://coinmarketcap.com/currencies/defipie/                                 ",
    "https://coinmarketcap.com/currencies/decubate/                                ",
    "https://coinmarketcap.com/currencies/amc-fight-night/                         ",
    "https://coinmarketcap.com/currencies/dogemon-go/                              ",
    "https://coinmarketcap.com/currencies/peakmines-peak/                          ",
    "https://coinmarketcap.com/currencies/qian-kun/                                ",
    "https://coinmarketcap.com/currencies/bitcoin-asset/                           ",
    "https://coinmarketcap.com/currencies/fibswap-dex/                             ",
    "https://coinmarketcap.com/currencies/br34p/                                   ",
    "https://coinmarketcap.com/currencies/dxsale-network/                          ",
    "https://coinmarketcap.com/currencies/ramifi-protocol/                         ",
    "https://coinmarketcap.com/currencies/zomfi/                                   ",
    "https://coinmarketcap.com/currencies/lever-token/                             ",
    "https://coinmarketcap.com/currencies/frenchie-network/                        ",
    "https://coinmarketcap.com/currencies/cyber-crystal/                           ",
    "https://coinmarketcap.com/currencies/crossfi/                                 ",
    "https://coinmarketcap.com/currencies/copuppy/                                 ",
    "https://coinmarketcap.com/currencies/daolaunch/                               ",
    "https://coinmarketcap.com/currencies/truepnl/                                 ",
    "https://coinmarketcap.com/currencies/ten/                                     ",
    "https://coinmarketcap.com/currencies/macaronswap/                             ",
    "https://coinmarketcap.com/currencies/boy-x-highspeed/                         ",
    "https://coinmarketcap.com/currencies/birb/                                    ",
    "https://coinmarketcap.com/currencies/cub-finance/                             ",
    "https://coinmarketcap.com/currencies/monster-galaxy/                          ",
    "https://coinmarketcap.com/currencies/jojo/                                    ",


];

header("Content-Type: text/plain");

$crawler = new Crawler();

$slack = new SlackClient('https://hooks.slack.com/services/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');;

$lastRoundCoins = unserialize(file_get_contents('last_rounded_coins.txt'));
if (empty($lastRoundCoins)) {
    $lastRoundCoins = [];
}
shuffle($arr);
foreach ($arr as $coin) {
    try {


        $data = $crawler->assignDetailInformationToCoin(trim($coin));
        $percent = floatval(explode("\n", $data)[1]);

        if ($percent > 20.0) {
            if (!array_search($coin, $lastRoundCoins)) {
                $message = new Message();
                $message->setText($coin);
                $slack->sendMessage($message);
                $crawler->returnArray[] = trim($coin);
            }
        }
    } catch (Exception $e) {
        $crawler->getClient()->quit();
        continue;
    }
}
$crawler->getClient()->quit();

file_put_contents('last_rounded_coins.txt', serialize($crawler->returnArray));

$alertCoins = Crawler::removeDuplicates($crawler->returnArray, $lastRoundCoins);
