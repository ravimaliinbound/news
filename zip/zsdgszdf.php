<?php
$show_this_block = get_sub_field('show_this_block');
$drink_menu = get_sub_field('drink_menu');
?>

<?php if ($show_this_block == "Yes" && is_array($drink_menu) && !empty($drink_menu)): ?>
    <?php foreach ($drink_menu as $menu_item): ?>

        <div class="drinkmenucols grid-item item wow text-fade">

            <!-- Loop through the 'content' repeater -->
            <?php if (isset($menu_item['content']) && is_array($menu_item['content'])): ?>
                <?php foreach ($menu_item['content'] as $content): ?>

                    <div class="content">
                        <?php if (isset($content['drink__group'])): ?>
                            <div class="drinkmenutitle text-center w-100">
                                <h3>
                                    <?php echo !empty($content['drink__group']['drink_title']) ? $content['drink__group']['drink_title'] : ''; ?>
                                    <?php if (!empty($content['drink__group']['drink_description'])): ?>
                                        <span><?php echo $content['drink__group']['drink_description']; ?></span>
                                    <?php endif; ?>
                                </h3>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($content['drink_types']) && is_array($content['drink_types'])): ?>
                            <?php foreach ($content['drink_types'] as $drink_type): ?>
                                <?php
                                $columns = (int)($content['drink__group']['number_of_column'] ?? 0);

                                // Determine main table class based on number of columns
                                switch ($columns) {
                                    case 1:
                                        $tableClass = 'dmtwocols';
                                        break;
                                    case 2:
                                        $tableClass = 'dmThreecols';
                                        break;
                                    case 3:
                                        $tableClass = 'dmfourcols';
                                        break;
                                    case 4:
                                        $tableClass = 'dmfivecols';
                                        break;
                                    default:
                                        $tableClass = 'dmThreecols'; // fallback
                                        break;
                                }
                                ?>

                                <div class="drinkmenuTable <?php echo $tableClass; ?> w-100">
                                    <div class="drinkmenuTrw">
                                        <?php if ($columns == 1): ?>
                                            <div class="dmtwocfcl">
                                                <?php if (!empty($drink_type['type_group']['type_name'])): ?>
                                                    <h3>
                                                        <?php echo $drink_type['type_group']['type_name']; ?>
                                                        <?php if (!empty($drink_type['type_group']['type_description'])): ?>
                                                            <span><?php echo $drink_type['type_group']['type_description']; ?></span>
                                                        <?php endif; ?>
                                                    </h3>
                                                <?php endif; ?>
                                            </div>
                                            <div class="dmtwocsecondcl"><?php echo $drink_type['type_column_1'] ?? ''; ?></div>

                                        <?php elseif ($columns == 2): ?>
                                            <div class="drinkmenufcl">
                                                <?php echo $drink_type['type_group']['type_name'] ?? ''; ?>
                                                <?php if (!empty($drink_type['type_group']['type_description'])): ?>
                                                    <span><?php echo $drink_type['type_group']['type_description']; ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="drinkmenusecondcl"><?php echo $drink_type['type_column_1'] ?? ''; ?></div>
                                            <div class="drinkmenuthreecl"><?php echo $drink_type['type_column_2'] ?? ''; ?></div>

                                        <?php elseif ($columns == 3): ?>
                                            <div class="drinkmenufcl">
                                                <?php echo $drink_type['type_group']['type_name'] ?? ''; ?>
                                                <?php if (!empty($drink_type['type_group']['type_description'])): ?>
                                                    <span><?php echo $drink_type['type_group']['type_description']; ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="drinkmenusecondcl"><?php echo $drink_type['type_column_1'] ?? ''; ?></div>
                                            <div class="drinkmenuthreecl"><?php echo $drink_type['type_column_2'] ?? ''; ?></div>
                                            <div class="drinkmenuthreecl"><?php echo $drink_type['type_column_3'] ?? ''; ?></div>

                                        <?php elseif ($columns == 4): ?>
                                            <div class="dmfvcfcl">
                                                <?php echo $drink_type['type_group']['type_name'] ?? ''; ?>
                                                <?php if (!empty($drink_type['type_group']['type_description'])): ?>
                                                    <span><?php echo $drink_type['type_group']['type_description']; ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="dmfvcsecondcl"><?php echo $drink_type['type_column_1'] ?? ''; ?></div>
                                            <div class="dmfvcthreecl"><?php echo $drink_type['type_column_2'] ?? ''; ?></div>
                                            <div class="dmfvcfourcl"><?php echo $drink_type['type_column_3'] ?? ''; ?></div>
                                            <div class="dmfvcfivecl"><?php echo $drink_type['type_column_4'] ?? ''; ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>




                    </div>
                <?php endforeach; ?>


        </div>
    <?php endif; ?>

<?php endforeach; ?>

<?php endif; ?>