# CmfLayoutedPageBundle

###Warning: under construction

This bundle will fit all benefits of the symfony-cmf together with an layout grid system.
I plan to build the following things:

- LayoutedPageBlock which references one Layout and several blocks in a ReferenceContainerBlock
- blocks can be "located" in grid-containers.
- ReferenceContainerBlock should be able to map the containing blocks to the grid-containers (maybe by id)
- easy to map just a single LayoutedPageBlock to some routes (or an menu).
- should be able to render all containing blocks like child blocks
- LayoutDocument that can have several row/column/container documents as children. These child structure
  will be visible in a purecss grid layout. Containers can contain the blocks which the LayoutedPageBlock
  references.

To create those LayoutPageBlock i plan to build a special form type to simply drag&drop existing blocks
into the chosen grid. Maybe the Layout can map some css-style information to, but first i will start to
create a simple grid based on the count of columns that a row contains.

These are my ideas. Lets start.
