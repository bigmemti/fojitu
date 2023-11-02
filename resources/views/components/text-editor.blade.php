<div x-data="editor(@js(old($column, $value)))">

    <template x-if="isLoaded()">
      <div class="menu">
        <button @click.prevent="toggleBold()"                 :class="{ 'is-active' : isActive('bold', updatedAt) }"                   > Bold             </button>
        <button @click.prevent="toggleItalic()"               :class="{ 'is-active' : isActive('italic', updatedAt) }"                 > Italic           </button>
        <button @click.prevent="toggleStrike()"               :class="{ 'is-active' : isActive('strike', updatedAt) }"                 > Strike           </button>
        <button @click.prevent="toggleCode()"                 :class="{ 'is-active' : isActive('code', updatedAt) }"                   > Code             </button>
        <button @click.prevent="unsetAllMarks()"              :class="{ 'is-active' : isActive('clear-marks', updatedAt) }"            > Clear Marks      </button>
        <button @click.prevent="clearNodes()"                 :class="{ 'is-active' : isActive('clear-nodes', updatedAt) }"            > Clear Nodes      </button>
        <button @click.prevent="setParagraph()"               :class="{ 'is-active' : isActive('paragraph', updatedAt) }"              > Paragraph        </button>
        <button @click.prevent="toggleHeading({ level: 1 })"  :class="{ 'is-active' : isActive('heading', { level: 1 }, updatedAt) }"  > H1               </button>
        <button @click.prevent="toggleHeading({ level: 2 })"  :class="{ 'is-active' : isActive('heading', { level: 2 }, updatedAt) }"  > H2               </button>
        <button @click.prevent="toggleHeading({ level: 3 })"  :class="{ 'is-active' : isActive('heading', { level: 3 }, updatedAt) }"  > H3               </button>
        <button @click.prevent="toggleHeading({ level: 4 })"  :class="{ 'is-active' : isActive('heading', { level: 4 }, updatedAt) }"  > H4               </button>
        <button @click.prevent="toggleHeading({ level: 5 })"  :class="{ 'is-active' : isActive('heading', { level: 5 }, updatedAt) }"  > H5               </button>
        <button @click.prevent="toggleHeading({ level: 6 })"  :class="{ 'is-active' : isActive('heading', { level: 6 }, updatedAt) }"  > H6               </button>
        <button @click.prevent="toggleBulletList()"           :class="{ 'is-active' : isActive('bullet-list', updatedAt) }"            > Bullet List      </button>
        <button @click.prevent="toggleOrderedList()"          :class="{ 'is-active' : isActive('ordered-list', updatedAt) }"           > Ordered List     </button>
        <button @click.prevent="toggleCodeBlock()"            :class="{ 'is-active' : isActive('code-block', updatedAt) }"             > Code Block       </button>
        <button @click.prevent="toggleBlockquote()"           :class="{ 'is-active' : isActive('blockquote', updatedAt) }"             > Blockquote       </button>
        <button @click.prevent="setHorizontalRule()"          :class="{ 'is-active' : isActive('horizontal-rule', updatedAt) }"        > Horizontal Rule  </button>
        <button @click.prevent="setHardBreak()"               :class="{ 'is-active' : isActive('hard-break', updatedAt) }"             > Hard Break       </button>
        <button @click.prevent="undo()"                       :class="{ 'is-active' : isActive('undo', updatedAt) }"                   > Undo             </button>
        <button @click.prevent="redo()"                       :class="{ 'is-active' : isActive('redo', updatedAt) }"                   > Redo             </button>
      </div>
    </template>

    <div class="show" x-ref="element"></div>
    <textarea x-ref="textarea" class="bg-gray-900 hidden" name="{{ $column }}" id="{{ $column }}" cols="30" rows="10"></textarea>
</div>
