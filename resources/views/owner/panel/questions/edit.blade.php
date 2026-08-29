<select name="assessment_id" class="form-select">

    @foreach($assessments as $assessment)

        <option
            value="{{ $assessment->id }}"
            {{ old('assessment_id', $question->assessment_id) == $assessment->id ? 'selected' : '' }}
        >

            {{ $assessment->title }}

        </option>

    @endforeach

</select>