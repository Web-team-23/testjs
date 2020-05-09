<?php

declare(strict_types=1);

namespace PackageVersions;

/**
 * This class is generated by ocramius/package-versions, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 */
final class Versions
{
    public const ROOT_PACKAGE_NAME = '__root__';
    /**
     * Array of all available composer packages.
     * Dont read this array from your calling code, but use the \PackageVersions\Versions::getVersion() method instead.
     *
     * @var array<string, string>
     * @internal
     */
    public const VERSIONS          = array (
  'doctrine/annotations' => '1.10.1@5eb79f3dbdffed6544e1fc287572c0f462bd29bb',
  'doctrine/cache' => '1.10.0@382e7f4db9a12dc6c19431743a2b096041bcdd62',
  'doctrine/collections' => '1.6.4@6b1e4b2b66f6d6e49983cebfe23a21b7ccc5b0d7',
  'doctrine/common' => '2.12.0@2053eafdf60c2172ee1373d1b9289ba1db7f1fc6',
  'doctrine/dbal' => 'v2.10.1@c2b8e6e82732a64ecde1cddf9e1e06cb8556e3d8',
  'doctrine/doctrine-bundle' => '2.0.7@6926771140ee87a823c3b2c72602de9dda4490d3',
  'doctrine/doctrine-migrations-bundle' => '2.1.2@856437e8de96a70233e1f0cc2352fc8dd15a899d',
  'doctrine/event-manager' => '1.1.0@629572819973f13486371cb611386eb17851e85c',
  'doctrine/inflector' => '1.3.1@ec3a55242203ffa6a4b27c58176da97ff0a7aec1',
  'doctrine/instantiator' => '1.3.0@ae466f726242e637cebdd526a7d991b9433bacf1',
  'doctrine/lexer' => '1.2.0@5242d66dbeb21a30dd8a3e66bf7a73b66e05e1f6',
  'doctrine/migrations' => '2.2.1@a3987131febeb0e9acb3c47ab0df0af004588934',
  'doctrine/orm' => 'v2.7.2@dafe298ce5d0b995ebe1746670704c0a35868a6a',
  'doctrine/persistence' => '1.3.7@0af483f91bada1c9ded6c2cfd26ab7d5ab2094e0',
  'doctrine/reflection' => '1.2.1@55e71912dfcd824b2fdd16f2d9afe15684cfce79',
  'easycorp/easyadmin-bundle' => 'v2.3.8@c28301cc7f7df9531fd3b8b91196ab11a71074c4',
  'egulias/email-validator' => '2.1.17@ade6887fd9bd74177769645ab5c474824f8a418a',
  'jdorn/sql-formatter' => 'v1.2.17@64990d96e0959dff8e059dfcdc1af130728d92bc',
  'jms/metadata' => '2.1.0@8d8958103485c2cbdd9a9684c3869312ebdaf73a',
  'monolog/monolog' => '1.25.3@fa82921994db851a8becaf3787a9e73c5976b6f1',
  'ocramius/package-versions' => '1.5.1@1d32342b8c1eb27353c8887c366147b4c2da673c',
  'ocramius/proxy-manager' => '2.2.3@4d154742e31c35137d5374c998e8f86b54db2e2f',
  'pagerfanta/pagerfanta' => 'v2.1.3@a53ff01d521648d9dbca19b93ac6bc75a59b0972',
  'phpdocumentor/reflection-common' => '2.0.0@63a995caa1ca9e5590304cd845c15ad6d482a62a',
  'phpdocumentor/reflection-docblock' => '5.1.0@cd72d394ca794d3466a3b2fc09d5a6c1dc86b47e',
  'phpdocumentor/type-resolver' => '1.1.0@7462d5f123dfc080dfdf26897032a6513644fc95',
  'psr/cache' => '1.0.1@d11b50ad223250cf17b86e38383413f5a6764bf8',
  'psr/container' => '1.0.0@b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
  'psr/link' => '1.0.0@eea8e8662d5cd3ae4517c9b864493f59fca95562',
  'psr/log' => '1.1.3@0f73288fd15629204f9d42b7055f72dacbe811fc',
  'sensio/framework-extra-bundle' => 'v5.5.4@d0585d4825a87a5030ca8cd34adb4a17e1066c17',
  'symfony/asset' => 'v4.4.7@e3574559efcb51601022fa46fd88dd13a8febdc2',
  'symfony/cache' => 'v4.4.7@f777b570291aebe51081b9827e05f3a747665e87',
  'symfony/cache-contracts' => 'v2.0.1@23ed8bfc1a4115feca942cb5f1aacdf3dcdf3c16',
  'symfony/config' => 'v4.4.7@3f4a3de1af498ed0ea653d4dc2317794144e6ca4',
  'symfony/console' => 'v4.4.7@10bb3ee3c97308869d53b3e3d03f6ac23ff985f7',
  'symfony/debug' => 'v4.4.7@346636d2cae417992ecfd761979b2ab98b339a45',
  'symfony/dependency-injection' => 'v4.4.7@755b18859be26b90f4bf63753432d3387458bf31',
  'symfony/doctrine-bridge' => 'v4.4.7@7889c9df9fe4d95042c2f6e79901c9e6517343d9',
  'symfony/dotenv' => 'v4.4.7@a78e698cfb8aca8ef6814639eb5ffc17180a4326',
  'symfony/error-handler' => 'v4.4.7@7e9828fc98aa1cf27b422fe478a84f5b0abb7358',
  'symfony/event-dispatcher' => 'v4.4.7@abc8e3618bfdb55e44c8c6a00abd333f831bbfed',
  'symfony/event-dispatcher-contracts' => 'v1.1.7@c43ab685673fb6c8d84220c77897b1d6cdbe1d18',
  'symfony/expression-language' => 'v4.4.7@c4171e39e6cfc72e2bedb44922310d7d2bd2ab91',
  'symfony/filesystem' => 'v4.4.7@fe297193bf2e6866ed900ed2d5869362768df6a7',
  'symfony/finder' => 'v4.4.7@5729f943f9854c5781984ed4907bbb817735776b',
  'symfony/flex' => 'v1.6.2@e4f5a2653ca503782a31486198bd1dd1c9a47f83',
  'symfony/form' => 'v4.4.7@6dfd2d0f47b9a4abee73807f7172e2b8a0006571',
  'symfony/framework-bundle' => 'v4.4.7@80cdda836cfbe3ccb2bdd4a974f632473f0807a6',
  'symfony/http-client' => 'v4.4.7@9a8f5c968dc68d58044f8e9ff39d03074489b55d',
  'symfony/http-client-contracts' => 'v2.0.1@378868b61b85c5cac6822d4f84e26999c9f2e881',
  'symfony/http-foundation' => 'v4.4.7@62f92509c9abfd1f73e17b8cf1b72c0bdac6611b',
  'symfony/http-kernel' => 'v4.4.7@f356a489e51856b99908005eb7f2c51a1dfc95dc',
  'symfony/inflector' => 'v4.4.7@53cfa47fe9142f39b5605df67bada3893dd4f46c',
  'symfony/intl' => 'v4.4.7@63238a53b1cf0cd3e2b0b22cabc7c0b6f3fd4562',
  'symfony/mailer' => 'v4.4.7@449856e70ccb1c91ebd75d6fb287ffe21be9fafe',
  'symfony/mime' => 'v4.4.7@6dde9dc70155e91b850b1d009d1f841c54bc4aba',
  'symfony/monolog-bridge' => 'v4.4.7@2df4a774d99ae6e87c8b67891430f935312be412',
  'symfony/monolog-bundle' => 'v3.5.0@dd80460fcfe1fa2050a7103ad818e9d0686ce6fd',
  'symfony/options-resolver' => 'v4.4.7@9072131b5e6e21203db3249c7db26b52897bc73e',
  'symfony/orm-pack' => 'v1.0.8@c9bcc08102061f406dc908192c0f33524a675666',
  'symfony/polyfill-intl-grapheme' => 'v1.15.0@b6786f69dd7b062390582f20520ab4918283217e',
  'symfony/polyfill-intl-icu' => 'v1.15.0@9c281272735eb66476e0fa7381e03fb0d4b60197',
  'symfony/polyfill-intl-idn' => 'v1.15.0@47bd6aa45beb1cd7c6a16b7d1810133b728bdfcf',
  'symfony/polyfill-intl-normalizer' => 'v1.15.0@e62715f03f90dd8d2f3eb5daa21b4d19d71aebde',
  'symfony/polyfill-mbstring' => 'v1.15.0@81ffd3a9c6d707be22e3012b827de1c9775fc5ac',
  'symfony/polyfill-php72' => 'v1.15.0@37b0976c78b94856543260ce09b460a7bc852747',
  'symfony/polyfill-php73' => 'v1.15.0@0f27e9f464ea3da33cbe7ca3bdf4eb66def9d0f7',
  'symfony/process' => 'v4.4.7@3e40e87a20eaf83a1db825e1fa5097ae89042db3',
  'symfony/property-access' => 'v4.4.7@75cbf0f388d82685ce06515951397bc1370901d7',
  'symfony/property-info' => 'v4.4.7@b6baecd501adec01a9d68f9c90b83659656065af',
  'symfony/routing' => 'v4.4.7@0f562fa613e288d7dbae6c63abbc9b33ed75a8f8',
  'symfony/security-bundle' => 'v4.4.7@1c317cd29a75e4806479241ffd31d8035e243420',
  'symfony/security-core' => 'v4.4.7@e99ad8bcd5d1202a1cff7b3e0e76d9077d81cbe6',
  'symfony/security-csrf' => 'v4.4.7@286a71ff176e1b0dd071f0e73dcec0970a56634b',
  'symfony/security-guard' => 'v4.4.7@606a741712d8adb49aee9b59d57010724db06797',
  'symfony/security-http' => 'v4.4.7@b413064160255c31077bb082d25b7bd89275971b',
  'symfony/serializer' => 'v4.4.7@2a508a535f2323defb325cf28301064fcbb061b9',
  'symfony/serializer-pack' => 'v1.0.3@9bbce72dcad0cca797b678d3bfb764cf923ab28a',
  'symfony/service-contracts' => 'v2.0.1@144c5e51266b281231e947b51223ba14acf1a749',
  'symfony/stopwatch' => 'v4.4.7@e0324d3560e4128270e3f08617480d9233d81cfc',
  'symfony/string' => 'v5.0.8@48a2f4b3597514e6c885c0ddb22d3bbdb60517d0',
  'symfony/translation' => 'v4.4.7@4e54d336f2eca5facad449d0b0118bb449375b76',
  'symfony/translation-contracts' => 'v2.0.1@8cc682ac458d75557203b2f2f14b0b92e1c744ed',
  'symfony/twig-bridge' => 'v4.4.7@bef4da6724c5a89bb3408d3bc785be7cd5b9efed',
  'symfony/twig-bundle' => 'v4.4.7@44e3e82867bf4dcf52732dd7e0c83826f9da1095',
  'symfony/twig-pack' => 'v1.0.0@8b278ea4b61fba7c051f172aacae6d87ef4be0e0',
  'symfony/validator' => 'v4.4.7@2bf1de9d5cac5e5ebc159203c53dcf5b2058d340',
  'symfony/var-dumper' => 'v4.4.7@5a0c2d93006131a36cf6f767d10e2ca8333b0d4a',
  'symfony/var-exporter' => 'v4.4.7@6e4939b084defee0ab60a21e6a02e3a198afd91f',
  'symfony/web-link' => 'v4.4.7@9ec692b342855335f3f4e77753ad71f85c6038f8',
  'symfony/yaml' => 'v4.4.7@ef166890d821518106da3560086bfcbeb4fadfec',
  'twig/extra-bundle' => 'v3.0.3@6eaf1637abe6b68518e7e0949ebb84e55770d5c6',
  'twig/twig' => 'v3.0.3@3b88ccd180a6b61ebb517aea3b1a8906762a1dc2',
  'vich/uploader-bundle' => '1.13.2@f24c3a1764d30cbe6e7d4d8bbc2daca6f0c2693e',
  'webmozart/assert' => '1.7.0@aed98a490f9a8f78468232db345ab9cf606cf598',
  'zendframework/zend-code' => '3.4.1@268040548f92c2bfcba164421c1add2ba43abaaa',
  'zendframework/zend-eventmanager' => '3.2.1@a5e2583a211f73604691586b8406ff7296a946dd',
  'nikic/php-parser' => 'v4.3.0@9a9981c347c5c49d6dfe5cf826bb882b824080dc',
  'symfony/browser-kit' => 'v4.4.7@e4b0dc1b100bf75b5717c5b451397f230a618a42',
  'symfony/css-selector' => 'v4.4.7@afc26133a6fbdd4f8842e38893e0ee4685c7c94b',
  'symfony/debug-bundle' => 'v4.4.7@dc847e4971b9f76b30e02d421b303d349d5aeed2',
  'symfony/debug-pack' => 'v1.0.8@7310a66f9f81c9f292ff9089f0b0062386cb83fb',
  'symfony/dom-crawler' => 'v4.4.7@4d0fb3374324071ecdd94898367a3fa4b5563162',
  'symfony/maker-bundle' => 'v1.15.0@31396f2e61803f0e2debbb43ba5aa21acbc6e15a',
  'symfony/phpunit-bridge' => 'v5.0.7@0258b43a94972abf1ee99ce2221359f8ac2a17fd',
  'symfony/profiler-pack' => 'v1.0.4@99c4370632c2a59bb0444852f92140074ef02209',
  'symfony/test-pack' => 'v1.0.6@ff87e800a67d06c423389f77b8209bc9dc469def',
  'symfony/web-profiler-bundle' => 'v4.4.7@4c432f5c21c700270819daacf95323302fa8f004',
  'paragonie/random_compat' => '2.*@143144a9adb1a93da3e59ff17bc2e6a569e6786d',
  'symfony/polyfill-ctype' => '*@143144a9adb1a93da3e59ff17bc2e6a569e6786d',
  'symfony/polyfill-iconv' => '*@143144a9adb1a93da3e59ff17bc2e6a569e6786d',
  'symfony/polyfill-php71' => '*@143144a9adb1a93da3e59ff17bc2e6a569e6786d',
  'symfony/polyfill-php70' => '*@143144a9adb1a93da3e59ff17bc2e6a569e6786d',
  'symfony/polyfill-php56' => '*@143144a9adb1a93da3e59ff17bc2e6a569e6786d',
  '__root__' => 'dev-master@143144a9adb1a93da3e59ff17bc2e6a569e6786d',
);

    private function __construct()
    {
    }

    /**
     * @throws \OutOfBoundsException If a version cannot be located.
     *
     * @psalm-param key-of<self::VERSIONS> $packageName
     */
    public static function getVersion(string $packageName) : string
    {
        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new \OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }
}
