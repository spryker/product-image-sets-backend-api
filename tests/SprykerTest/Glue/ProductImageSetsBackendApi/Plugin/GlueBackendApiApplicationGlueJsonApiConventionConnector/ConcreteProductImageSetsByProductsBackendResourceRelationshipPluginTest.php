<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Glue\ProductImageSetsBackendApi\Plugin\GlueBackendApiApplicationGlueJsonApiConventionConnector;

use Codeception\Test\Unit;
use Generated\Shared\DataBuilder\ProductImageBuilder;
use Generated\Shared\Transfer\GlueRequestTransfer;
use Generated\Shared\Transfer\ProductImageSetsBackendApiAttributesTransfer;
use Generated\Shared\Transfer\ProductImageSetTransfer;
use Spryker\Glue\ProductImageSetsBackendApi\Plugin\GlueBackendApiApplicationGlueJsonApiConventionConnector\ConcreteProductImageSetsByProductsBackendResourceRelationshipPlugin;
use SprykerTest\Glue\ProductImageSetsBackendApi\ProductImageSetsBackendApiTester;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Glue
 * @group ProductImageSetsBackendApi
 * @group Plugin
 * @group GlueBackendApiApplicationGlueJsonApiConventionConnector
 * @group ConcreteProductImageSetsByProductsBackendResourceRelationshipPluginTest
 * Add your own group annotations below this line
 */
class ConcreteProductImageSetsByProductsBackendResourceRelationshipPluginTest extends Unit
{
    /**
     * @uses \Spryker\Glue\ProductImageSetsBackendApi\ProductImageSetsBackendApiConfig::RESOURCE_CONCRETE_PRODUCT_IMAGE_SETS
     *
     * @var string
     */
    protected const RESOURCE_CONCRETE_PRODUCT_IMAGE_SETS = 'concrete-product-image-sets';

    /**
     * @var \SprykerTest\Glue\ProductImageSetsBackendApi\ProductImageSetsBackendApiTester
     */
    protected ProductImageSetsBackendApiTester $tester;

    /**
     * @return void
     */
    public function testGetRelationshipResourceTypeShouldReturnCorrectType(): void
    {
        // Act
        $relationshipResourceType = (new ConcreteProductImageSetsByProductsBackendResourceRelationshipPlugin())
            ->getRelationshipResourceType();

        // Assert
        $this->assertSame(static::RESOURCE_CONCRETE_PRODUCT_IMAGE_SETS, $relationshipResourceType);
    }

    /**
     * @return void
     */
    public function testAddRelationshipsShouldAddProductImageSetsRelationshipToGlueResourceTransfer(): void
    {
        // Arrange
        $productConcreteTransfer = $this->tester->haveProduct();
        $this->tester->haveProductImageSet([
            ProductImageSetTransfer::ID_PRODUCT => $productConcreteTransfer->getIdProductConcrete(),
            ProductImageSetTransfer::PRODUCT_IMAGES => [
                (new ProductImageBuilder())->build(),
                (new ProductImageBuilder())->build(),
            ],
        ]);

        $glueResourceTransfers = [$this->tester->createProductConcreteResource($productConcreteTransfer)];

        // Act
        (new ConcreteProductImageSetsByProductsBackendResourceRelationshipPlugin())
            ->addRelationships($glueResourceTransfers, new GlueRequestTransfer());

        // Assert
        $this->assertCount(1, $glueResourceTransfers);
        $this->assertCount(1, $glueResourceTransfers[0]->getRelationships());
    }

    /**
     * @return void
     */
    public function testAddRelationshipsShouldShouldSkipExpansionDueToWrongResourceType(): void
    {
        // Arrange
        $productConcreteTransfer = $this->tester->haveProduct();
        $this->tester->haveProductImageSet([
            ProductImageSetTransfer::ID_PRODUCT => $productConcreteTransfer->getIdProductConcrete(),
        ]);

        $glueResourceTransfers = [$this->tester->createProductConcreteResource($productConcreteTransfer)->setType('fake-type')];

        // Act
        (new ConcreteProductImageSetsByProductsBackendResourceRelationshipPlugin())
            ->addRelationships($glueResourceTransfers, new GlueRequestTransfer());

        // Assert
        $this->assertCount(1, $glueResourceTransfers);
        $this->assertCount(0, $glueResourceTransfers[0]->getRelationships());
    }

    /**
     * @return void
     */
    public function testAddRelationshipsShouldAddCorrectProductImageSetRelationshipId(): void
    {
        // Arrange
        $productConcreteTransfer = $this->tester->haveProduct();
        $this->tester->haveProductImageSet([
            ProductImageSetTransfer::ID_PRODUCT => $productConcreteTransfer->getIdProductConcrete(),
            ProductImageSetTransfer::PRODUCT_IMAGES => [
                (new ProductImageBuilder())->build(),
                (new ProductImageBuilder())->build(),
            ],
        ]);

        $glueResourceTransfers = [$this->tester->createProductConcreteResource($productConcreteTransfer)];

        // Act
        (new ConcreteProductImageSetsByProductsBackendResourceRelationshipPlugin())
            ->addRelationships($glueResourceTransfers, new GlueRequestTransfer());

        // Assert
        /** @var \Generated\Shared\Transfer\GlueRelationshipTransfer $glueRelationshipTransfer */
        $glueRelationshipTransfer = $glueResourceTransfers[0]->getRelationships()->getIterator()->current();
        /** @var \Generated\Shared\Transfer\GlueResourceTransfer $glueResourceTransfer */
        $glueResourceTransfer = $glueRelationshipTransfer->getResources()->getIterator()->current();

        $this->assertSame($productConcreteTransfer->getSku(), $glueResourceTransfer->getId());
    }

    /**
     * @return void
     */
    public function testAddRelationshipsShouldAddCorrectProductImageSetRelationshipType(): void
    {
        // Arrange
        $productConcreteTransfer = $this->tester->haveProduct();
        $this->tester->haveProductImageSet([
            ProductImageSetTransfer::ID_PRODUCT => $productConcreteTransfer->getIdProductConcrete(),
            ProductImageSetTransfer::PRODUCT_IMAGES => [
                (new ProductImageBuilder())->build(),
                (new ProductImageBuilder())->build(),
            ],
        ]);

        $glueResourceTransfers = [$this->tester->createProductConcreteResource($productConcreteTransfer)];

        // Act
        (new ConcreteProductImageSetsByProductsBackendResourceRelationshipPlugin())
            ->addRelationships($glueResourceTransfers, new GlueRequestTransfer());

        // Assert
        /** @var \Generated\Shared\Transfer\GlueRelationshipTransfer $glueRelationshipTransfer */
        $glueRelationshipTransfer = $glueResourceTransfers[0]->getRelationships()->getIterator()->current();
        /** @var \Generated\Shared\Transfer\GlueResourceTransfer $glueResourceTransfer */
        $glueResourceTransfer = $glueRelationshipTransfer->getResources()->getIterator()->current();

        $this->assertSame(static::RESOURCE_CONCRETE_PRODUCT_IMAGE_SETS, $glueResourceTransfer->getType());
    }

    /**
     * @return void
     */
    public function testAddRelationshipsShouldAddCorrectProductImageSetRelationshipAttributes(): void
    {
        // Arrange
        $productConcreteTransfer = $this->tester->haveProduct();
        $this->tester->haveProductImageSet([
            ProductImageSetTransfer::ID_PRODUCT => $productConcreteTransfer->getIdProductConcrete(),
            ProductImageSetTransfer::NAME => 'fake-name',
            ProductImageSetTransfer::PRODUCT_IMAGES => [
                (new ProductImageBuilder())->build(),
                (new ProductImageBuilder())->build(),
            ],
        ]);

        $glueResourceTransfers = [$this->tester->createProductConcreteResource($productConcreteTransfer)];

        // Act
        (new ConcreteProductImageSetsByProductsBackendResourceRelationshipPlugin())
            ->addRelationships($glueResourceTransfers, new GlueRequestTransfer());

        // Assert
        /** @var \Generated\Shared\Transfer\GlueRelationshipTransfer $glueRelationshipTransfer */
        $glueRelationshipTransfer = $glueResourceTransfers[0]->getRelationships()->getIterator()->current();
        /** @var \Generated\Shared\Transfer\GlueResourceTransfer $glueResourceTransfer */
        $glueResourceTransfer = $glueRelationshipTransfer->getResources()->getIterator()->current();

        $productImageSetsBackendApiAttributesTransfer = (new ProductImageSetsBackendApiAttributesTransfer())
            ->fromArray($glueResourceTransfer->getAttributes()->toArray(), true);

        /** @var \Generated\Shared\Transfer\ProductImageSetBackendApiAttributesTransfer $productImageSetBackendApiAttributesTransfer */
        $productImageSetBackendApiAttributesTransfer = $productImageSetsBackendApiAttributesTransfer->getImageSets()->getIterator()->current();

        $this->assertSame('fake-name', $productImageSetBackendApiAttributesTransfer->getName());
        $this->assertCount(2, $productImageSetBackendApiAttributesTransfer->getImages());
    }

    /**
     * @return void
     */
    public function testAddRelationshipsShouldAddProductImageSetsRelationshipToGlueResourceFilteredByLocale(): void
    {
        // Arrange
        $localeTransfer = $this->tester->haveLocale(['localeName' => 'de_DE']);
        $localeTransfer2 = $this->tester->haveLocale(['localeName' => 'en_US']);

        $productConcreteTransfer = $this->tester->haveProduct();
        $this->tester->haveProductImageSet([
            ProductImageSetTransfer::ID_PRODUCT => $productConcreteTransfer->getIdProductConcrete(),
            ProductImageSetTransfer::LOCALE => $localeTransfer,
        ]);
        $this->tester->haveProductImageSet([
            ProductImageSetTransfer::ID_PRODUCT => $productConcreteTransfer->getIdProductConcrete(),
            ProductImageSetTransfer::LOCALE => $localeTransfer2,
        ]);

        $glueResourceTransfers = [$this->tester->createProductConcreteResource($productConcreteTransfer)];

        // Act
        (new ConcreteProductImageSetsByProductsBackendResourceRelationshipPlugin())
            ->addRelationships($glueResourceTransfers, (new GlueRequestTransfer())->setLocale($localeTransfer->getLocaleName()));

        // Assert
        /** @var \Generated\Shared\Transfer\GlueRelationshipTransfer $glueRelationshipTransfer */
        $glueRelationshipTransfer = $glueResourceTransfers[0]->getRelationships()->getIterator()->current();
        /** @var \Generated\Shared\Transfer\GlueResourceTransfer $glueResourceTransfer */
        $glueResourceTransfer = $glueRelationshipTransfer->getResources()->getIterator()->current();

        $productImageSetsBackendApiAttributesTransfer = (new ProductImageSetsBackendApiAttributesTransfer())
            ->fromArray($glueResourceTransfer->getAttributes()->toArray(), true);

        $this->assertCount(1, $productImageSetsBackendApiAttributesTransfer->getImageSets());
    }
}
